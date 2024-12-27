<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('photos', PhotoController::class);
    Route::get('/my-gallery', [PhotoController::class, 'myGallery'])->name('photos.my-gallery');

    Route::post('/new-comment/{photo_id}', [CommentController:: class, 'store'])->name('comments.store');
    Route::delete('/comment/{id}', [CommentController:: class, 'destroy'])->name('comments.destroy');

    Route::post('/vote', [VoteController::class, 'store'])->name('votes.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
