<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class UserCourseController extends Controller
{
    // Semua kursus yang tersedia
    public function available()
    {
        $courses = Course::with('tutor')->get(); // atau filter tertentu
        return view('user.content.available_courses', compact('courses'));
    }

    // Kursus yang sudah diambil user
    public function myCourses()
    {
        $user = auth()->user();
        $courses = $user->courses; // atau ->courses()->get()

        return view('user.content.my_courses', compact('course'));
    }
    public function selectCourse(Request $request)
    {
        $user = auth()->user();

        dd($user); // ini akan menunjukkan apakah benar instance model User

        $user->course_id = $request->course_id;
        $user->save();

        return back();
    }
}
