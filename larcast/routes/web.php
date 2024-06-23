<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;



Route::resource('/contact', ContactController::class);
Route::resource('/messages', MessageController::class);

Route::get('/about', function() {
    return view('about');
});


Route::get('/', function() {
    return view('home');
});