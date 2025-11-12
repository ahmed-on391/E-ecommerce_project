<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

//الـ Route يربط رابط الويب بالـ Controller وبدوره يرجّع View.
Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'home'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auArab. And and. At Coda got the headache, albums and coding. Got an adapter before it is going to workout. So so right now. Right. Now this is. I. I. But. I. Command. Command bombardment. Command. I am. I. Well. Mean. Vatika. Java. Lola Lamberti. Allah. Notebook. I. Advil. Atomic. Atomic. Atomic. Coda. Add product. th')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard')->middleware('auth', 'admin');



Route::get('view_category', action: [AdminController::class, 'index'])->name('view_category')->middleware('auth', 'admin');

Route::post('add_category', [AdminController::class, 'store'])->name('add_category')->middleware('auth', 'admin');

Route::delete('delete_category/{id}', [AdminController::class, 'destroy'])->name('delete_category')->middleware('auth', 'admin');

Route::get('edit_category/{id}', [AdminController::class, 'edit'])->name('edit_category')->middleware('auth', 'admin');

Route::put('update_category/{id}', [AdminController::class, 'update'])->name('update_category')->middleware('auth', 'admin');


Route::get('add_product', [AdminController::class, 'add_product'])->middleware('auth', 'admin');

Route::post('upload_product', [AdminController::class, 'upload_product'])->middleware('auth', 'admin');

Route::get('view_product', [AdminController::class, 'view_product'])->middleware('auth', 'admin');

Route::delete('delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product')->middleware('auth', 'admin');


Route::get('update_product/{id}', [AdminController::class, 'update_product'])->middleware('auth', 'admin');

Route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware('auth', 'admin');


Route::get('view_product', [AdminController::class, 'view_product'])->name('view_product')->middleware('auth', 'admin');


Route::get('product_search', [AdminController::class, 'product_search'])->middleware('auth', 'admin');


Route::get('product_details/{id}', [HomeController::class, 'product_details'])->middleware('auth');

Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware('auth', 'verified');

