<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TutorDashboardController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Landing Page
Route::get('/', function () {
    return view('landing.home');
})->name('home');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/login', function () {
    return view('auth.choose-login');
})->name('login.choose');

Route::get('login/user', [AuthController::class, 'showLoginFormUser'])->name('login');
Route::post('login/user', [AuthController::class, 'login'])->name('login');

// LOGIN TUTOR
Route::get('login/tutor', [AuthController::class, 'showLoginFormTutor'])->name('login.tutor');
Route::post('login/tutor', [AuthController::class, 'login'])->name('login.tutor');

// LOGIN ADMIN
Route::get('login/admin', [AuthController::class, 'showLoginFormAdmin'])->name('login.admin');
Route::post('login/admin', [AuthController::class, 'login'])->name('login.admin');

// LOGOUT
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// User dashboard
Route::middleware(['auth', 'isUser'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard.user');
    Route::get('/courses', [UserDashboardController::class, 'courses'])->name('user.courses');
    Route::get('/quiz', [UserDashboardController::class, 'quiz'])->name('user.quiz');
    Route::get('/certificate', [UserDashboardController::class, 'certificate'])->name('user.certificate');
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('user.profile');
    Route::post('/select-package', [UserDashboardController::class, 'selectPackage'])->name('user.select.package');

});

// Tutor dashboard
Route::get('/dashboard/tutor', [TutorDashboardController::class, 'index'])->name('dashboard.tutor');

// Admin dashboard
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard.admin');
    Route::get('/siswa', [AdminDashboardController::class, 'user'])->name('admin.user');
    Route::get('/tutor', [AdminDashboardController::class, 'tutor'])->name('admin.tutor');
    Route::get('/quiz', [AdminDashboardController::class, 'quiz'])->name('admin.quiz');
    Route::get('/profile', [AdminDashboardController::class, 'profile'])->name('admin.profile');
});
