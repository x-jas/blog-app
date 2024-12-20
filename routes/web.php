<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// Splash Screen
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // View Posts
    Route::get('/dashboard', function () {
        $posts = Post::where('author_id', auth()->user()->id)->latest()->paginate(10);

        return view('dashboard', compact('posts'));
    })->name('dashboard');

    // Create Post
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    // Store Post
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    // Edit Post
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

    // Update Post
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

    // Delete Post
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

require __DIR__.'/auth.php';
