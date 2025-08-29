<?php

use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Admin\CategoryController;
use App\Http\Controllers\Dashboard\Admin\ContentController;
use App\Http\Controllers\Dashboard\Admin\CourseController;
use App\Http\Controllers\Dashboard\Admin\HomeController;
use App\Http\Controllers\Dashboard\Admin\InstructorController;
use App\Http\Controllers\Dashboard\Admin\LessonController;
use App\Http\Controllers\Dashboard\Admin\MessageController;
use App\Http\Controllers\Dashboard\Admin\SpecialityController;
use App\Http\Controllers\Dashboard\Admin\UserController;


Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

    //Categories
    Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{category}/edit', 'edit')->name('edit');
        Route::put('/{category}', 'update')->name('update');
        Route::delete('/{category}', 'destroy')->name('destroy');
        Route::get('/{category}', 'show')->name('show');
    });

    //Instructors 
    Route::controller(InstructorController::class)->prefix('instructors')->name('instructors.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{instructor}/edit', 'edit')->name('edit');
        Route::put('/{instructor}', 'update')->name('update');
        Route::delete('/{instructor}', 'destroy')->name('destroy');
        Route::get('/{instructor}', 'show')->name('show');
    });

    //Admins
    Route::controller(AdminController::class)->prefix('admins')->name('admins.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{admin}', 'edit')->name('edit');
        Route::put('/{admin}', 'update')->name('update');
        Route::delete('/{admin}', 'destroy')->name('destroy');
    });

    // Specialities
    Route::controller(SpecialityController::class)->prefix('specialities')->name('specialities.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{speciality}/edit', 'edit')->name('edit');
        Route::put('/{speciality}', 'update')->name('update');
        Route::delete('/{speciality}', 'destroy')->name('destroy');
        Route::get('/{speciality}', 'show')->name('show');
    });

    //Users
    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::delete('/{user}', 'destroy')->name('destroy');
        Route::get('/{user}', 'show')->name(name: 'show');
    });

    //Messages 
    Route::controller(MessageController::class)->prefix('messages')->name('messages.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::delete('/{message}', 'destroy')->name('destroy');
    });

    //Courses
    Route::controller(CourseController::class)->prefix('courses')
        ->name('courses.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{course}/edit', 'edit')->name('edit');
            Route::put('/{course}', 'update')->name('update');
            Route::delete('{course}', 'destroy')->name('destroy');
            Route::get('/{course}', 'show')->name('show');
        });

    //Contents
    Route::controller(ContentController::class)
        ->prefix('courses/{course}/contents')
        ->group(function () {
            Route::get('/create', 'create')->name('contents.create');
            Route::post('/', 'store')->name('contents.store');
            Route::get('/{content}/edit','edit')->name('contents.edit');
            Route::put('/{content}', 'update')->name('contents.update');
            Route::delete('/{content}', 'destroy')->name('contents.destroy');
            Route::get('/{content}', 'show')->name('contents.show');
        });

        Route::controller(LessonController::class)
        ->prefix('courses/{course}/contents/{content}/lessons')
        ->group(function () {
                Route::get('/create', 'create')->name('lessons.create');
                Route::post('/', 'store')->name('lessons.store');
                Route::get('/{lesson}/edit','edit')->name('lessons.edit');
                Route::put('/{lesson}', 'update')->name('lessons.update');
                Route::delete('/{lesson}', 'destroy')->name('lessons.destroy');
                Route::get('/{lesson}','show')->name('lessons.show');
            });
});