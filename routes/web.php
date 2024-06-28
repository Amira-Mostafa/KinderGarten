<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

Route::get('/home', [NavController::class, 'index'])->name('home');
Route::get('/aboutUs', [NavController::class, 'aboutUs'])->name('aboutUs');
Route::get('/classes', [NavController::class, 'classes'])->name('classes');
Route::get('/facilities', [NavController::class, 'facilities'])->name('facilities');
Route::get('/team', [NavController::class, 'team'])->name('team');
Route::get('/callToAction', [NavController::class, 'callToAction'])->name('callToAction');
Route::get('/appointment', [NavController::class, 'appointment'])->name('appointment');
Route::get('/testimonial', [NavController::class, 'testimonial'])->name('testimonial');
Route::get('/contact', [NavController::class, 'contact'])->name('contact');

Route::view('/dashboard', 'dashboard');


Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');
Route::get('/addTeacher', [TeacherController::class, 'create'])->name('addTeacher');
Route::post('/storeTeacher', [TeacherController::class, 'store'])->name('storeTeacher');
Route::get('/showTeacher/{id}', [TeacherController::class, 'show'])->name('showTeacher');
Route::get('/editTeacher/{id}', [TeacherController::class, 'edit'])->name('editTeacher');
Route::Put('/updateTeacher', [TeacherController::class, 'update'])->name('updateTeacher');
Route::get('/deleteTeacher/{id}', [TeacherController::class, 'destroy']);
Route::get('/trashed', [TeacherController::class, 'trashed'])->name('trashed');
Route::get('/restore/{id}', [TeacherController::class, 'restore']);
Route::get('/finalDelete/{id}', [TeacherController::class, 'forceDelete']);



Route::get('/subjects', [SubjectController::class], 'index')->name('subjects');
Route::get('/classes', [ClassController::class], 'index')->name('classes');
