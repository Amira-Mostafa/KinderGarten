<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\RouteFileRegistrar;

require __DIR__ . '/auth.php';
Route::get('/not-found', [MainController::class, 'notFound'])->name('notFound');
Auth::routes(['verify' => true]); //it has all routes related to auth
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
        Route::get('callToAction', [MainController::class, 'callToAction'])->name('callToAction')->middleware('custom.auth', 'verified');
        Route::get('appointment', [MainController::class, 'appointment'])->name('appointment')->middleware('custom.auth', 'verified');
        Route::get('contact', [MainController::class, 'contact'])->name('contact')->middleware('custom.auth', 'verified');
        Route::post('sendEmail', [ContactController::class, 'send'])->name('sendEmail');
    }
);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
