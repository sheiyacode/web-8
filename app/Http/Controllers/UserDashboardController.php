<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\UserCourse;
use App\Models\QuizResult;
use App\Models\DailyContent;

class UserDashboardController extends Controller
{
  public function dashboard()
    {
        $user = Auth::user();

        $activeCourse = UserCourse::with('course')
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->first();

        $availableCourses = [];
        if (!$activeCourse) {
            $takenCourseIds = UserCourse::where('user_id', $user->id)->pluck('course_id');
            $availableCourses = Course::whereNotIn('id', $takenCourseIds)->get();
        }

        $quizResults = QuizResult::where('user_id', $user->id)->with('quiz')->get();

        $today = now()->toDateString();
        $dailyContent = DailyContent::where('date', $today)->first();

        return view('user.content.dashboard', compact(
            'user',
            'activeCourse',
            'availableCourses',
            'quizResults',
            'dailyContent'
        ));
        }
    public function courses()
    {
        $user = auth()->user();

        if (!$user->selected_package) {
            return view('user.content.choose-package');
        }

        $courses = Course::all();
        $activeCourse = $user->courses()->first(); // kursus aktif user

        // Jika user belum punya kursus aktif, tampilkan daftar yang bisa dipilih
        $availableCourses = Course::all();

        return view('user.content.courses', compact('courses', 'activeCourse', 'availableCourses'));
    }


    public function selectPackage(Request $request)
    {
        $request->validate([
            'package' => ['required', 'in:Basic,Intermediate,Advanced']
        ]);

        $user = auth()->user();

        // Simpan paket yang dipilih user
        $user->selected_package = $request->package;
        $user->save();

        // Cari kursus yang sesuai paket (admin sudah buat sebelumnya)
        $course = Course::where('title', 'like', $request->package . '%')->first();

        if ($course) {
            // Cegah user memilih lebih dari satu kursus
            if (!$user->courses()->where('course_id', $course->id)->exists()) {
                $user->courses()->attach($course->id);
            }
        } else {
            return back()->with('error', 'Kursus untuk paket tersebut belum tersedia. Hubungi admin.');
        }

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
