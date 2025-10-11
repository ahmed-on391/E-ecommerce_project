<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard')->middleware('auth', 'admin');



Route::get('view_category', [AdminController::class, 'index'])->name('view_category')->middleware('auth', 'admin');

Route::post('add_category', [AdminController::class, 'store'])->name('add_category')->middleware('auth', 'admin');

Route::delete('delete_category/{id}', [AdminController::class, 'destroy'])->name('delete_category')->middleware('auth', 'admin');

Route::get('edit_category/{id}', [AdminController::class, 'edit'])->name('edit_category')->middleware('auth', 'admin');

Route::put('update_category/{id}', [AdminController::class, 'update'])->name('update_category')->middleware('auth', 'admin');
