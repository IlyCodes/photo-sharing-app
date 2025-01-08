<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('/', function () {
    return to_route('photos.index');
})->name('/');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect()->route('photos.index');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::resource('photos', PhotoController::class)->only('index');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('photos', PhotoController::class)->except('index');
    Route::get('/my-gallery', [PhotoController::class, 'myGallery'])->name('photos.my-gallery');

    Route::post('/new-comment/{photo_id}', [CommentController:: class, 'store'])->name('comments.store');
    Route::delete('/comment/{id}', [CommentController:: class, 'destroy'])->name('comments.destroy');

    Route::post('/vote', [VoteController::class, 'store'])->name('votes.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
