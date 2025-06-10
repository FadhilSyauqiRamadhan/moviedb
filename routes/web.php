<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleAdmin;

Route::get('/', function () {
    return view('layouts.main');
});

Route::resource('movies', MovieController::class)->parameters(['movies' => 'movie']);

Route::get('/create-movie', [MovieController::class, 'create'])->name('movies.create')->middleware('auth');

Route::get('edit-movie', [MovieController::class, 'edit'])->name('movies.edit')->middleware('auth' , RoleAdmin::class);

Route::get('delete-movie', [MovieController::class, 'destroy'])->name('movies.destroy')->middleware('auth', RoleAdmin::class);

Route::post('/store-movie', [MovieController::class, 'store'])->name('movies.store')->middleware('auth');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/datamovie', [MovieController::class, 'datamovie'])->name('movies.datamovie');
