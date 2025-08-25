<?php

use App\Http\Controllers\Auth\AuthController;
// use App\Http\Controllers\Dashboard\Student\HomeController;
use App\Http\Controllers\Site\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::get('/about-us', function () {
    return view('site.pages.about');
})->name('site.about-us');

Route::get('/contact-us', function () {
    return view('site.pages.contact');
})->name('site.contact-us');

Route::get('/our-team', function () {
    return view('site.pages.team');
})->name('site.team');

Route::get('/testimonial', function () {
    return view('site.pages.testimonial');
})->name('site.testimonial');

Route::get('/courses', function () {
    return view('site.pages.courses');
})->name('site.courses');

Route::get('/course', function () {
    return view('site.pages.course');
})->name('site.course');

Route::get('/faq', function () {
    return view('site.pages.faq');
})->name('site.faq');

Route::get('/private-policy', function () {
    return view('site.pages.policy');
})->name('site.policy');

Route::get('/terms-and-conditions', function () {
    return view('site.pages.terms');
})->name('site.terms');
// Authentication Routes
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'submitLogin'])->name('auth.submit.login');

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'submitRegister'])->name('auth.submit.register');
//
// Route::get('/student-home', [HomeController::class, 'index']);

//
require __DIR__.'/admin.php';