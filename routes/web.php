<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isTeacher;
use App\Http\Middleware\isNormal;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(['auth', 'verified']);


// Route::get('teacher', function () {
//     return view('teacher');
// })->middleware(['auth', 'verified'])->name('teacher');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/adminDashboard', [HomeController::class, 'admin'])->middleware(['auth', 'isAdmin']);

//Route::get('/becomeATeacher', [HomeController::class, 'dashboard'])->name('dashboard');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('home', [NavController::class, 'index'])->name('home');
        Route::get('aboutUs', [NavController::class, 'aboutUs'])->name('aboutUs');
        Route::get('classes', [NavController::class, 'classes'])->name('classes');
        Route::get('facilities', [NavController::class, 'facilities'])->name('facilities');
        Route::get('team', [NavController::class, 'team'])->name('team');
        Route::get('callToAction', [NavController::class, 'callToAction'])->name('callToAction');
        Route::get('appointment', [NavController::class, 'appointment'])->name('appointment');
        Route::get('/', [NavController::class, 'testimonial'])->name('testimonial');
        Route::get('contact', [NavController::class, 'contact'])->name('contact');
    }
);
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::fallback([MainController::class, 'showNotFound']);
// Route::get('index', [MainController::class, 'index'])->name('index');
// Route::get('about', [MainController::class, 'about'])->name('about');
// Route::get('classes', [MainController::class, 'classes'])->name('classes');
// Route::get('contact', [MainController::class, 'contactUs'])->name('contact');
// Route::get('testimonial', [MainController::class, 'testimonial'])->name('testimonial');
// Route::get('facility', [MainController::class, 'facility'])->name('facility');
// Route::get('team', [MainController::class, 'team'])->name('team');
// Route::get('call-to-action', [MainController::class, 'callToAction'])->name('callToAction');
// Route::get('appointment', [MainController::class, 'appointment'])->name('appointment');
// Route::post('send-email', [ContactController::class, 'send'])->name('sendEmail');


// Auth::routes(['verify' => true]);
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::view('/dashboard', 'dashboard');
Route::middleware(['web'])->group(function () {
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

    // Route::get('classIndex', [ClassController::class], 'index')->name('classIndex');
    Route::view('addClass', 'addClass');
    // Route::get('addClass', view('admin.addClass'));

    Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials');
    Route::get('addTestimonial', [TestimonialController::class, 'create'])->name('addTestimonial');
    Route::Post('storeTestimonial', [TestimonialController::class, 'store'])->name('storeTestimonial');
    Route::get('showTestimonial/{id}', [TestimonialController::class, 'show'])->name('showTestimonial');
    Route::get('editTestimonial/{id}', [TestimonialController::class, 'edit'])->name('editTestimonial');
    Route::put('updateTestimonial/{id}', [TestimonialController::class, 'update'])->name('updateTestimonial');
    Route::get('deleteTestimonial/{id}', [TestimonialController::class, 'destroy'])->name('deleteTestimonial');
});
