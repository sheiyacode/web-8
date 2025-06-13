<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\UserCourse;


class UserCourseController extends Controller
{
    // Semua kursus yang tersedia
    public function available()
    {
        $user = Auth::guard('user')->user();

        // Hanya tampilkan kursus kalau belum memilih
        if ($user->courses()->exists()) {
            return redirect()->route('user.courses.my')
                ->with('info', 'Kamu sudah memilih kursus.');
        }

        $courses = Course::with('tutor')->get();
        return view('user.content.available_courses', compact('courses'));
    }

    // Kursus yang sudah diambil user
    public function myCourses()
    {
        $user = auth()->user();
        $courses = $user->courses; // atau ->courses()->get()

    return view('user.content.my_courses', compact('courses'));

    }

    public function store(Request $request, $courseId)
    {
        $userId = auth()->id();

        // Cek apakah sudah punya kursus aktif
        $existing = UserCourse::where('user_id', $userId)->where('status', 'active')->first();
        if ($existing) {
            return redirect()->back()->with('error', 'Kamu sudah memiliki kursus aktif.');
        }

        UserCourse::create([
            'user_id' => $userId,
            'course_id' => $courseId,
            'status' => 'active',
            'progress' => 1,
        ]);

        return redirect()->route('dashboard.user')->with('success', 'Kursus berhasil diambil!');
    }
    // public function selectCourse(Request $request, Course $course)
    // {
    //     $request->validate([
    //         'package' => ['required']
    //     ]);

    //     $user = auth()->user();

    //     // Simpan paket yang dipilih user
    //     $user->selected_package = $request->package;
    //     $user->save();

    //     // Cari kursus yang sesuai paket (admin sudah buat sebelumnya)
    //     $course = Course::where('title', 'like', $request->package . '%')->first();

    //     if ($course) {
    //         // Cegah user memilih lebih dari satu kursus
    //         if (!$user->courses()->where('course_id', $course->id)->exists()) {
    //             $user->courses()->attach($course->id);
    //         }
    //     } else {
    //         return back()->with('error', 'Kursus untuk paket tersebut belum tersedia. Hubungi admin.');
    //     }

    //     return redirect()->route('user.courses')->with('success', 'Paket berhasil dipilih!');
    // }

}
