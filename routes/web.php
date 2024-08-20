<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;  // Import the UserController
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'homepage']);

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // New Route to Show Profile Details
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

    // Post Routes
    Route::get('/post_details/{id}', [HomeController::class, 'post_details'])->name('post.details');
    Route::post('/like_post/{id}', [HomeController::class, 'like_post'])->name('like.post');
    Route::post('/post_comment/{id}', [HomeController::class, 'post_comment'])->name('post.comment');
    Route::get('/create_post', [HomeController::class, 'create_post']);
    Route::post('/user_post', [HomeController::class, 'user_post']);
    Route::get('/my_post', [HomeController::class, 'my_post']);
    Route::get('/my_post_del/{id}', [HomeController::class, 'my_post_del']);
    Route::get('/post_update_page/{id}', [HomeController::class, 'post_update_page']);
    Route::post('/update_post_data/{id}', [HomeController::class, 'update_post_data']);

    // Comment Routes
    Route::get('/comment/{id}', [CommentController::class, 'create_comment'])->name('comment.create');
    Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::put('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.delete');

    // UserList Route
    Route::get('/user_list', [HomeController::class, 'userlist'])->name('home.userlist');
});

// Admin Routes
Route::get('/create', [AdminController::class, 'create']);
Route::post('/add_post', [AdminController::class, 'add_post']);
Route::get('/show_post', [AdminController::class, 'show_post']);
Route::get('/delete_post/{id}', [AdminController::class, 'delete_post']);
Route::get('/edit_page/{id}', [AdminController::class, 'edit_page']);
Route::post('/update_post/{id}', [AdminController::class, 'update_post']);
Route::get('/accept_post/{id}', [AdminController::class, 'accept_post']);
Route::get('/reject_post/{id}', [AdminController::class, 'reject_post']);

// Authentication Routes
require __DIR__ . '/auth.php';



// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\CommentController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\AdminController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'homepage']);

// Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
// Route::get('/about', [HomeController::class, 'about'])->middleware('auth')->name('about');

// // For Auth
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';

// // Admin Routes
// Route::get('/create', [AdminController::class, 'create']);
// Route::post('/add_post', [AdminController::class, 'add_post']);
// Route::get('/show_post', [AdminController::class, 'show_post']);
// Route::get('/delete_post/{id}', [AdminController::class, 'delete_post']);
// Route::get('/edit_page/{id}', [AdminController::class, 'edit_page']);
// Route::post('/update_post/{id}', [AdminController::class, 'update_post']);
// Route::get('/accept_post/{id}', [AdminController::class, 'accept_post']);
// Route::get('/reject_post/{id}', [AdminController::class, 'reject_post']);

// // User Routes
// Route::get('/post_details/{id}', [HomeController::class, 'post_details'])->middleware('auth')->name('post.details');
// Route::post('/like_post/{id}', [HomeController::class, 'like_post'])->middleware('auth')->name('like.post');
// Route::post('/post_comment/{id}', [HomeController::class, 'post_comment'])->middleware('auth')->name('post.comment');
// Route::get('/create_post', [HomeController::class, 'create_post'])->middleware('auth');
// Route::post('/user_post', [HomeController::class, 'user_post']);
// Route::get('/my_post', [HomeController::class, 'my_post'])->middleware('auth');
// Route::get('/my_post_del/{id}', [HomeController::class, 'my_post_del'])->middleware('auth');
// Route::get('/post_update_page/{id}', [HomeController::class, 'post_update_page'])->middleware('auth');
// Route::post('/update_post_data/{id}', [HomeController::class, 'update_post_data'])->middleware('auth');

// // Comments
// Route::get('/comment/{id}', [CommentController::class, 'create_comment'])->middleware('auth');
