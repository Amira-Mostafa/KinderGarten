<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('is_Admin');

Route::get('/admin/home', [AdminController::class, 'admin'])->name('admin.home')->middleware('is_Admin');
Route::get('/user/home', [UserController::class, 'UserHome'])->name('user.home');



Route::get('/aboutUs', [NavController::class, 'aboutUs'])->name('aboutUs');
Route::get('/classes', [NavController::class, 'classes'])->name('classes');
Route::get('/facilities', [NavController::class, 'facilities'])->name('facilities');
Route::get('/team', [NavController::class, 'team'])->name('team');
Route::get('/callToAction', [NavController::class, 'callToAction'])->name('callToAction');
Route::get('/appointment', [NavController::class, 'appointment'])->name('appointment');
Route::get('/testimonial', [NavController::class, 'testimonial'])->name('testimonial');
Route::get('/contact', [NavController::class, 'contact'])->name('contact');

Route::view('/dashboard', 'dashboard');