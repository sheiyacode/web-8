<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.content.dashboard');
    }

    public function siswa()
    {
        return view('admin.content.siswa');
    }

    public function tutor()
    {
        return view('admin.content.tutor');
    }

    public function quiz()
    {
        return view('admin.content.quiz');
    }

    public function profile()
    {
        return view('admin.content.profile');
    }
}
