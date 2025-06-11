<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        // Total data untuk ringkasan statistik
        $totalUsers = User::count();
        $totalTutors = Tutor::count();
        $totalCourses = Course::count();
        $totalQuizzes = Quiz::count();

        // Pie Chart: Jumlah siswa per kursus
        $courses = Course::withCount('users')->get();
        $pieLabels = $courses->pluck('title');
        $pieData = $courses->pluck('users_count');

        // Line Chart: Jumlah user baru per bulan
        $monthlyRegistrations = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupByRaw('MONTH(created_at)')
            ->pluck('count', 'month');

        $lineLabels = [];
        $lineData = [];

        for ($i = 1; $i <= 12; $i++) {
            $lineLabels[] = Carbon::create()->month($i)->format('F');
            $lineData[] = $monthlyRegistrations[$i] ?? 0;
        }

        return view('admin.content.dashboard', compact(
            'pieLabels', 'pieData', 'lineLabels', 'lineData',
            'totalUsers', 'totalTutors', 'totalCourses', 'totalQuizzes','courses'
        ));
    }

    public function user()
    {
        $users = User::with('courses')->get();
        return view('admin.content.user',compact('users'));
    }

    public function tutor()
    {
        $tutors = Tutor::all(); // ambil semua data tutor dari tabel tutors
        return view('admin.content.tutor',compact('tutors'));
    }

    public function quiz()
    {
        return view('admin.content.quiz');
    }

    public function createTutor()
    {
        return view('admin.content.tutor_create');
    }
    public function storeTutor(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tutors,email',
            'password' => 'required|min:6',
        ]);

        Tutor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.tutors')->with('success', 'Tutor berhasil ditambahkan!');
    }

}
