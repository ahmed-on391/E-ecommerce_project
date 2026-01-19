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

Route::get('/myorders', [App\Http\Controllers\HomeController::class, 'myorders'])
    ->middleware(['auth', 'verified'])
    ->name('myorders');

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


Route::get('update_product/{slug}', [AdminController::class, 'update_product'])->middleware('auth', 'admin');

Route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware('auth', 'admin');


Route::get('view_product', [AdminController::class, 'view_product'])->name('view_product')->middleware('auth', 'admin');


Route::get('product_search', [AdminController::class, 'product_search'])->middleware('auth', 'admin');


Route::get('product_details/{id}', [HomeController::class, 'product_details'])->middleware('auth');

// Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware('auth', 'verified');
Route::match(['get','post'], 'add_cart/{id}', [HomeController::class, 'add_cart'])->middleware('auth', 'verified');


Route::get('mycart', [HomeController::class, 'mycart'])->middleware('auth', 'verified');

Route::post('confirm_order', [HomeController::class, 'confirm_order'])->middleware('auth', 'verified');


Route::get('shop', [HomeController::class, 'shop'])->middleware('auth');

Route::get('why', [HomeController::class, 'why'])->middleware('auth');

Route::get('contact', [HomeController::class, 'contact'])->middleware('auth');






Route::get('view_orders', [AdminController::class, 'view_orders'])->middleware('auth', 'admin');

Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->middleware('auth', 'admin');

Route::get('delivered/{id}', [AdminController::class, 'delivered'])->middleware('auth', 'admin');

//stripe payment gateway routes دفعة سترايب 
// مسار عرض صفحة الدفع
Route::get('stripe/{total}', [HomeController::class, 'stripe']);

// مسار معالجة الدفع بعد كتابة بيانات الكارت
Route::post('stripe/{total}', [HomeController::class, 'stripePost'])->name('stripe.post');

Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->middleware('auth', 'admin');




