<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blogs/add',[BlogController::class, 'add'])->name('blog.add');
});

Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/blogs/{blog}',[BlogController::class, 'show'])->name('blog.show');
Route::get('/blogs/{blog}/edit',[BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blogs/{blog}/update',[BlogController::class, 'update'])->name('blog.update');
Route::delete('/blogs/{blog}/destroy',[BlogController::class, 'destroy'])->name('blog.destroy');

Route::get('/users/{user}',[UserController::class, 'profile'])->name('user.profile');



require __DIR__.'/settings.php';
