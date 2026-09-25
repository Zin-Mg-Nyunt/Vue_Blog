<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/blogs/{blog}/edit',[BlogController::class, 'edit'])->name('blog.edit');
Route::get('/blogs/{blog}',[BlogController::class, 'show'])->name('blog.show');
Route::put('/blogs/{blog}/update',[BlogController::class, 'update'])->name('blog.update');
Route::delete('/blogs/{blog}/destroy',[BlogController::class, 'destroy'])->name('blog.destroy');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
