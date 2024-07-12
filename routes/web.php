<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin;


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::fallback([MainController::class, 'notFound']);
        Route::get('/', [MainController::class, 'index'])->name('home');
        Route::get('home', [MainController::class, 'index'])->name('home');
        Route::get('aboutUs', [MainController::class, 'aboutUs'])->name('aboutUs');
        Route::get('ourClasses', [MainController::class, 'classes'])->name('ourClasses');
        Route::get('facilities', [MainController::class, 'facilities'])->name('facilities');
        Route::get('team', [MainController::class, 'team'])->name('team');
        Route::get('testimonial', [MainController::class, 'testimonial'])->name('testimonial');
        Route::get('callToAction', [MainController::class, 'callToAction'])->name('callToAction')->middleware('custom.auth');
        Route::get('appointment', [MainController::class, 'appointment'])->name('appointment')->middleware('custom.auth');
        Route::get('contact', [MainController::class, 'contact'])->name('contact')->middleware('custom.auth');
    }
);

//Route::get('/becomeATeacher', [HomeController::class, 'dashboard'])->name('dashboard');
// Route::post('send-email', [ContactController::class, 'send'])->name('sendEmail');
// Route::get('teacher', function () {
//     return view('teacher');
// })->middleware(['auth', 'verified'])->name('teacher');

// ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::get('/not-found', [MainController::class, 'notFound'])->name('notFound');
Auth::routes(['verify' => true]); //it has all routes related to auth

// Route::get('/dashboard', [HomeController::class, 'admin'])->name('dashboard')->middleware(['auth', 'isAdmin']);

// Route::view('/dashboard', 'dashboard');


Route::middleware(['web', 'isAdmin'])->group(function () {
    Route::fallback([MainController::class, 'notFound']);
    Route::get('/dashboard', [HomeController::class, 'admin'])->name('dashboard');
    // Route::get('/get-teachers/{subjectId}', [ClassController::class, 'getTeachers']);
    Route::get('teachers', [TeacherController::class, 'index'])->name('teachers');
    Route::get('addTeacher', [TeacherController::class, 'create'])->name('addTeacher');
    Route::post('storeTeacher', [TeacherController::class, 'store'])->name('storeTeacher');
    Route::get('showTeacher/{id}', [TeacherController::class, 'show'])->name('showTeacher');
    Route::get('editTeacher/{id}', [TeacherController::class, 'edit'])->name('editTeacher');
    Route::Put('update/{id}', [TeacherController::class, 'update'])->name('updateTeacher');
    Route::get('deleteTeacher/{id}', [TeacherController::class, 'destroy']);
    Route::get('trashed', [TeacherController::class, 'trashed'])->name('trashed');
    Route::get('restore/{id}', [TeacherController::class, 'restore']);
    Route::get('finalDelete/{id}', [TeacherController::class, 'forceDelete']);

    Route::get('subjects', [SubjectController::class, 'index'])->name('subjects');
    Route::get('addSubject', [SubjectController::class, 'create'])->name('addSubject');
    Route::Post('storeSubject', [SubjectController::class, 'store'])->name('storeSubject');
    Route::get('showSubject/{id}', [SubjectController::class, 'show'])->name('showSubject');
    Route::get('editSubject/{id}', [SubjectController::class, 'edit'])->name('editSubject');
    Route::put('updateSubject/{id}', [SubjectController::class, 'update'])->name('updateSubject');
    Route::get('deleteSubject/{id}', [SubjectController::class, 'destroy'])->name('deleteSubject');

    Route::get('classes', [ClassController::class, 'index'])->name('classes');
    Route::get('addClass', [ClassController::class, 'create'])->name('addClass');
    Route::Post('storeClass', [ClassController::class, 'store'])->name('storeClass');
    Route::get('showClass/{id}', [ClassController::class, 'show'])->name('showClass');
    Route::get('editClass/{id}', [ClassController::class, 'edit'])->name('editClass');
    Route::put('updateClass/{id}', [ClassController::class, 'update'])->name('updateClass');
    Route::get('deleteClass/{id}', [ClassController::class, 'destroy'])->name('deleteClass');

    Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials');
    Route::get('addTestimonial', [TestimonialController::class, 'create'])->name('addTestimonial');
    Route::Post('storeTestimonial', [TestimonialController::class, 'store'])->name('storeTestimonial');
    Route::get('showTestimonial/{id}', [TestimonialController::class, 'show'])->name('showTestimonial');
    Route::get('editTestimonial/{id}', [TestimonialController::class, 'edit'])->name('editTestimonial');
    Route::put('updateTestimonial/{id}', [TestimonialController::class, 'update'])->name('updateTestimonial');
    Route::get('deleteTestimonial/{id}', [TestimonialController::class, 'destroy'])->name('deleteTestimonial');
});
