<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
        protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            if ($request->is('admin/*')) {
                return route('login.admin');
            } elseif ($request->is('tutor/*')) {
                return route('login.tutor');
            } elseif ($request->is('user/*')) {
                return route('login'); // karena kamu sudah punya: Route::get('login/user')->name('login')
            } else {
                return route('login.choose'); // fallback ke halaman pemilihan role
            }
        }

        return null;
    }

}
