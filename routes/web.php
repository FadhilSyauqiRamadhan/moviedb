<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('layouts.main');
});

Route::resource('movies', MovieController::class)->parameters(['movies' => 'movie']);
