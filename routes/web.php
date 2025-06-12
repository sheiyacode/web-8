<?php

use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TutorDashboardController;
use App\Http\Controllers\TutorModuleController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\TutorQuizController;
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
    //Route::post('/select-package', [UserDashboardController::class, 'selectPackage'])->name('user.select.package');
});

Route::middleware(['auth:user'])->prefix('user')->group(function () {
    
    Route::get('/courses/available', [UserCourseController::class, 'available'])->name('user.courses.available');
    Route::get('/courses/my', [UserCourseController::class, 'myCourses'])->name('user.courses.my');
    Route::post('/select-course', [UserCourseController::class, 'selectCourse'])->name('user.select.package');

});

// Admin dashboard
Route::middleware(['web', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard.admin');

    //bagian user
    Route::get('/siswa', [AdminDashboardController::class, 'user'])->name('admin.users');
    Route::get('/siswa/{id}/edit', [AdminDashboardController::class, 'editUser'])->name('admin.user.edit');
    Route::delete('/siswa/{id}', [AdminDashboardController::class, 'deleteUser'])->name('admin.user.delete');
    Route::put('/siswa/{id}', [AdminDashboardController::class, 'updateUser'])->name('admin.user.update');
    Route::get('/quiz', [AdminDashboardController::class, 'quiz'])->name('admin.quizzes');

    //bagian tutor
    Route::get('/tutor', [AdminDashboardController::class, 'tutor'])->name('admin.tutors');
    Route::get('/tutor/create', [AdminDashboardController::class, 'createTutor'])->name('admin.tutor.create');
    Route::post('/tutor/store', [AdminDashboardController::class, 'storeTutor'])->name('admin.tutor.store');
    Route::get('/tutor/{id}/edit', [AdminDashboardController::class, 'editTutor'])->name('admin.tutor.edit');
    Route::put('/tutor/{id}', [AdminDashboardController::class, 'updateTutor'])->name('admin.tutor.update');
    Route::delete('/tutor/{id}', [AdminDashboardController::class, 'deleteTutor'])->name('admin.tutor.delete');
});

//Route Course pada Admin
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/courses', [AdminCourseController::class, 'course'])->name('admin.course');
    Route::get('/courses/create', [AdminCourseController::class, 'create'])->name('admin.course.create');
    Route::post('/courses/store', [AdminCourseController::class, 'store'])->name('admin.course.store');
    Route::get('/courses/{id}/edit', [AdminCourseController::class, 'edit'])->name('admin.course.edit');
    Route::put('/courses/{id}', [AdminCourseController::class, 'update'])->name('admin.course.update');
    Route::delete('/courses/{id}', [AdminCourseController::class, 'destroy'])->name('admin.course.destroy');
});

// tutor
Route::middleware(['web', 'auth:tutor'])->prefix('dashboard')->group(function () {
    Route::get('/tutor', [TutorDashboardController::class, 'index'])->name('dashboard.tutor');

    Route::get('/courses', [TutorDashboardController::class, 'courses'])->name('tutor.courses'); 
    //Route::get('/tutor/courses/{id}/modules', [TutorDashboardController::class, 'modules'])->name('tutor.courses.modules.dashboard');
    
    Route::get('/quiz', [TutorDashboardController::class, 'quiz'])->name('tutor.quiz');
    Route::get('/students', [TutorDashboardController::class, 'students'])->name('tutor.students');
    Route::post('/logout', [TutorDashboardController::class, 'logout'])->name('tutor.logout');
});

Route::middleware(['web', 'auth:tutor'])->prefix('dashboard')->group(function () {
    Route::get('/tutor/courses/{course}/modules', [TutorModuleController::class, 'index'])->name('tutor.courses.modules');
    Route::get('/tutor/courses/{course}/modules/{week}/create', [TutorModuleController::class, 'create'])->name('tutor.modules.create');
    Route::post('/tutor/courses/{course}/modules/{week}', [TutorModuleController::class, 'store'])->name('tutor.modules.store');
    Route::get('/tutor/courses/{course}/modules/{week}/edit', [TutorModuleController::class, 'edit'])->name('tutor.modules.edit');

    Route::put('/tutor/modules/{module}', [TutorModuleController::class, 'update'])->name('tutor.modules.update');
    Route::delete('/tutor/modules/{module}', [TutorModuleController::class, 'destroy'])->name('tutor.modules.destroy');

});
Route::middleware(['web', 'auth:tutor'])->prefix('dashboard')->group(function () {
    Route::get('/quizzes', [TutorQuizController::class, 'index'])->name('tutor.quizzes.index');
    Route::get('/quizzes/create/{course}/{week}', [TutorQuizController::class, 'create'])->name('tutor.quizzes.create');
    Route::post('/quizzes/store/{course}/{week}', [TutorQuizController::class, 'store'])->name('tutor.quizzes.store');
    Route::get('/quizzes/show/{course}/{week}', [TutorQuizController::class, 'show'])->name('tutor.quizzes.show');
    Route::delete('/quizzes/destroy/{course}/{week}', [TutorQuizController::class, 'destroy'])->name('tutor.quizzes.destroy');

});