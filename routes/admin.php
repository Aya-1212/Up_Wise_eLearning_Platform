<?php

use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Admin\CategoryController;
use App\Http\Controllers\Dashboard\Admin\HomeController;
use App\Http\Controllers\Dashboard\Admin\InstructorController;
use App\Http\Controllers\Dashboard\Admin\MessageController;
use App\Http\Controllers\Dashboard\Admin\SpecialityController;
use App\Http\Controllers\Dashboard\Admin\UserController;


Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

    //Categories
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('/categories/add', [CategoryController::class, 'add'])
        ->name('categories.add');
    Route::post('/categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::get('/categories/{category}', [CategoryController::class, 'edit'])
        ->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');

    //Instructors 

    Route::get('/instructors', [InstructorController::class, 'index'])
        ->name('instructors.index');

    Route::get('/instructors/add', [InstructorController::class, 'add'])
        ->name('instructors.add');
    Route::post('/instructors', [InstructorController::class, 'store'])
        ->name('instructors.store');

    Route::get('/instructors/{instructor}', [InstructorController::class, 'edit'])
        ->name('instructors.edit');
    Route::put('/instructors/{instructor}', [InstructorController::class, 'update'])
        ->name('instructors.update');

    Route::delete('/instructors/{instructor}', [InstructorController::class, 'destroy'])
        ->name('instructors.destroy');

    //Admins
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admins', 'index')->name('admins.index');
        Route::get('/admins/add', 'add')->name('admins.add');
        Route::post('/admins', 'store')->name('admins.store');
        Route::get('/admins/{admin}', 'edit')->name('admins.edit');
        Route::put('/admins/{admin}', 'update')->name('admins.update');
        Route::delete('/admins/{admin}', 'destroy')->name('admins.destroy');
    });

    // Specialities
    Route::controller(SpecialityController::class)->group(function () {
        Route::get('/specialities', 'index')->name('specialities.index');
        Route::get('/specialities/{speciality}', 'show')->name('specialities.show');
        Route::get('/specialities/add', 'add')->name('specialities.add');
        Route::post('/specialities', 'store')->name('specialities.store');
        Route::get('/specialities/{speciality}/edit', 'edit')->name('specialities.edit');
        Route::put('/specialities/{speciality}', 'update')->name('specialities.update');
        Route::delete('/specialities/{speciality}', 'destroy')->name('specialities.destroy');
    });

    //Users
    Route::controller(UserController::class)->group(function (){
        Route::get('/users','index')->name('users.index');
        Route::get('/users/{user}','show')->name('users.show');
        Route::get('/users/add','add')->name('users.add');
        Route::post('/users','store')->name('users.store');
        Route::delete('/users/{user}','destroy')->name('users.destroy');
    });

    //Messages 
    Route::controller(MessageController::class)->group(function (){
        Route::get('/messages','index')->name('messages.index');
        Route::delete('/messages/{message}','destroy')->name('messages.destroy');
    });
});