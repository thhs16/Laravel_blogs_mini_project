<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::redirect('/', '/blogs');

Route::get('/blogs',[BlogController::class,'index'])->name('mainPage');

Route::post('/blogs/create', [BlogController::class,'create'])->name('blogCreate');

Route::get('/blogs/delete/{id}', [BlogController::class,'delete'])->name('blogDelete');

// route testing
// Route::post('/welcome', function () {
//         return view('welcome');
// })->name('welcomePg');
