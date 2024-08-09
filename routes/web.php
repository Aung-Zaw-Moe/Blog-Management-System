<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'homepage']);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// For Auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/create', [AdminController::class, 'create']);
Route::post('/add_post', [AdminController::class, 'add_post']);
Route::get('/show_post', [AdminController::class, 'show_post']);
Route::get('/delete_post/{id}', [AdminController::class, 'delete_post']);
Route::get('/edit_page/{id}', [AdminController::class, 'edit_page']);
Route::post('/update_post/{id}', [AdminController::class, 'update_post']);
//For U Home
Route::get('/post_details/{id}', [HomeController::class, 'post_details']);
// In routes/web.php
Route::post('/like_post/{id}', [HomeController::class, 'likePost'])->name('like_post');
Route::get('/create_post', [HomeController::class, 'create_post'])->middleware('auth');
Route::post('/user_post', [HomeController::class, 'user_post']);
Route::get('/my_post', [HomeController::class, 'my_post'])->middleware('auth');
Route::get('/my_post_del/{id}', [HomeController::class, 'my_post_del'])->middleware('auth');
Route::get('/post_update_page/{id}', [HomeController::class, 'post_update_page'])->middleware('auth');
Route::post('/update_post_data/{id}', [HomeController::class, 'update_post_data'])->middleware('auth');

Route::get('/accept_post/{id}', [AdminController::class, 'accept_post']);
Route::get('/reject_post/{id}', [AdminController::class, 'reject_post']);
Route::get('/add_comment/{id}', [HomeController::class, 'addComment']);
