<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::redirect('/', '/blogs');

Route::get('/blogs',[BlogController::class,'index'])->name('mainPage');

Route::post('/blogs/create', [BlogController::class,'create'])->name('blogCreate');

Route::get('/blogs/delete/{id}', [BlogController::class,'delete'])->name('blogDelete');

Route::get('/blogs/details/{id}', [BlogController::class,'details'])->name('blogDetails');

Route::get('/blogs/edit/{id}', [BlogController::class,'edit'])->name('blogEdit');

Route::get('/blogs/update/{id}', [BlogController::class,'update'])->name('blogUpdate');
