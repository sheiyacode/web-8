<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use App\Models\ModuleProgress; // jika kamu melacak baca modul
use App\Models\QuizResult;     // jika kamu melacak quiz siswa

class TutorDashboardController extends Controller
{
    public function index()
    {
        
        $tutor = Auth::guard('tutor')->user();
        $courses = Course::where('tutor_id', $tutor->id)->withCount(['users', 'modules', 'quizzes'])->get();
        $jumlahKursus = $courses->count();
        $totalSiswa = $courses->sum('users_count');
        $totalQuiz = $courses->pluck('quizzes')->flatten()->count();
        $kursusTerakhir = $courses->sortByDesc('updated_at')->first();
        $siswaTerbaru = collect();
        foreach ($courses as $course) {
            foreach ($course->users as $user) {
                $siswaTerbaru->push([
                    'name' => $user->name,
                    'course' => $course->title,
                    'registered_at' => $user->pivot->created_at,]);
            }}
        $siswaTerbaru = $siswaTerbaru->sortByDesc('registered_at')->take(5);
        $courses = Course::where('tutor_id', $tutor->id)->with(['modules'])->get();
        $modul = $courses->flatMap->modules;
        $modulBelumLengkap = false;
        $thisWeek = now()->startOfWeek();
            foreach ($courses as $course) {
            $modulMingguIni = $course->modules->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            if ($modulMingguIni->isEmpty()) {
                $modulBelumLengkap = true;
                break;
            }
        }
        return view('tutor.content.dashboard', compact('tutor','courses', 'jumlahKursus','totalQuiz', 'totalSiswa', 'kursusTerakhir','siswaTerbaru','modul','modulBelumLengkap'));

    }
    public function modules($id)
    {
        $course = Course::with('modules')->findOrFail($id);
        $weeks = range(1, 12); // untuk 12 minggu
        return view('tutor.content.module', compact('course', 'weeks'));
    }

    public function courses()
    {
        $tutor = auth()->guard('tutor')->user();
        $courses = $tutor->courses; // pastikan relasi 'courses' ada di model Tutor

        return view('tutor.content.courses', compact('courses'));
    }
    public function quiz()
    {
        return view('tutor.content.quiz');
    }

    public function students()
    {
        $tutorId = auth()->guard('tutor')->id();

        $courses = Course::where('tutor_id', $tutorId)
            ->with('students') // pastikan relasi students() ada di model Course
            ->get();

        return view('tutor.content.students', compact('courses'));
    }
}
