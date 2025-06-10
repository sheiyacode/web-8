<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\User;



class UserDashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user(); // ambil user yang sedang login
        return view('user.content.dashboard', compact('user')); // kirim ke view
    }

    public function courses()
    {
    $user = auth()->user();

    // Jika belum pilih paket, tampilkan view pilihan paket
        if (!$user->selected_package) {
            return view('user.content.choose-package');
        }

    // Jika sudah pilih, tampilkan kursusnya
        $courses = Course::where('user_id', $user->id)->get();
            return view('user.content.courses', compact('courses'));
    }
    public function selectPackage(Request $request)
{
    $request->validate([
        'package' => ['required', 'in:Basic,Intermediate,Advanced']
    ]);
    /** @var \App\Models\User $user */
    $user = auth()->user();
    $user->selected_package = $request->package;
    $user->save();

    // (Opsional) Buat kursus otomatis
    Course::create([
        'title' => $request->package . ' Course',
        'description' => '12 modul untuk level ' . $request->package,
        'user_id' => $user->id,
        'image' => 'https://via.placeholder.com/150',
    ]);

    return redirect()->route('user.courses')->with('success', 'Paket berhasil dipilih!');
}


    public function quiz()
    {
        return view('user.content.quiz');
    }

    public function certificate()
    {
        return view('user.content.certificate');
    }

    public function profile()
    {
        return view('user.content.profile');
    }
}
