<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route for displaying the form to create a new post
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    // Route for handling the submission of the new post form
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    //route for edit post
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

    //delete the post
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    //search post made by specific user
    Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');

    //like post
    Route::post('/like/{post}', [LikeController::class, 'store'])->name('like.store');

    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';