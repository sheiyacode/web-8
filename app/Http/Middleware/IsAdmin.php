<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }


        abort(403); // atau bisa redirect ke halaman lain
    }
}
