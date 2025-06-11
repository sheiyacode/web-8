<?php

use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TutorDashboardController;
use App\Http\Controllers\User\UserCourseController;
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

Route::get('login/user', [AuthController::class, 'showLoginFormUser'])->name('login.user');
Route::post('login/user', [AuthController::class, 'login'])->name('login.user.submit');

// LOGIN TUTOR
Route::get('login/tutor', [AuthController::class, 'showLoginFormTutor'])->name('login.tutor');
Route::post('login/tutor', [AuthController::class, 'login'])->name('login.tutor');

// LOGIN ADMIN
Route::get('login/admin', [AuthController::class, 'showLoginFormAdmin'])->name('login.admin');
Route::post('login/admin', [AuthController::class, 'login'])->name('login.admin.submit');

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
Route::middleware(['web', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard.admin');
    Route::get('/siswa', [AdminDashboardController::class, 'user'])->name('admin.users');
    Route::get('/tutor', [AdminDashboardController::class, 'tutor'])->name('admin.tutors');
    Route::get('/quiz', [AdminDashboardController::class, 'quiz'])->name('admin.quizzes');

    //bagian create
    Route::get('/tutor/create', [AdminDashboardController::class, 'createTutor'])->name('admin.tutor.create');
    Route::post('/tutor/store', [AdminDashboardController::class, 'storeTutor'])->name('admin.tutor.store');

    //Route::get('/courses/create', [AdminDashboardController::class, 'createCourse'])->name('admin.course.create');
    //Route::post('/courses/store', [AdminDashboardController::class, 'storeCourse'])->name('admin.course.store');
    //Route::get('/admin/courses', [AdminDashboardController::class, 'course'])->name('admin.course');
    //Route::get('/admin/courses/create', [AdminDashboardController::class, 'createCourse'])->name('admin.course.create');
    //Route::post('/admin/courses', [AdminDashboardController::class, 'storeCourse'])->name('admin.course.store');

});

//Route Course pada Admin
// web.php
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/courses', [AdminCourseController::class, 'course'])->name('admin.course');
    Route::get('/courses/create', [AdminCourseController::class, 'create'])->name('admin.course.create');
    Route::post('/courses/store', [AdminCourseController::class, 'store'])->name('admin.course.store');
    Route::get('/courses/{id}/edit', [AdminCourseController::class, 'edit'])->name('admin.course.edit');
    Route::put('/courses/{id}', [AdminCourseController::class, 'update'])->name('admin.course.update');
    Route::delete('/courses/{id}', [AdminCourseController::class, 'destroy'])->name('admin.course.destroy');
});

Route::middleware(['auth:user'])->prefix('user')->group(function () {
    Route::get('/courses/available', [UserCourseController::class, 'available'])->name('user.courses.available');
    Route::get('/courses/my', [UserCourseController::class, 'myCourses'])->name('user.courses.my');
});
