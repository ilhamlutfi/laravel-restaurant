<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ChefController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\ImageController;
use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Frontend\BookingController;

Route::get('/', MainController::class);

Route::post('booking', [BookingController::class, 'store'])->name('book.attempt');

Route::prefix('panel')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('panel.dashboard');

    Route::resource('image', ImageController::class)->names('panel.image');

    Route::resource('menu', MenuController::class)->names('panel.menu');

    Route::resource('chef', ChefController::class)
    ->except(['show'])
    ->names('panel.chef');

    Route::resource('event', EventController::class)->names('panel.event');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
