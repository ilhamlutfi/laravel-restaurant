<?php

use App\Http\Controllers\Backend\ImageController;
use App\Http\Controllers\Backend\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('panel')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('panel.dashboard');

    Route::resource('image', ImageController::class)->names('panel.image');

    Route::resource('menu', MenuController::class)->names('panel.menu');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
