<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

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
}
