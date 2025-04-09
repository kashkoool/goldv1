<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreOwnerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WelcomeController;



// Assign the WelcomeController to the root route
Route::get('/', [WelcomeController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::middleware(['auth', 'store_owner','throttle:60,1'])->group(function () {
    Route::get('/store-owner/dashboard', [StoreOwnerController::class, 'dashboard'])->name('store_owner.dashboard');
    Route::get('/store-owner/products/create', [StoreOwnerController::class, 'create'])->name('store_owner.products.create');
    Route::post('/store-owner/products', [StoreOwnerController::class, 'store'])->name('store_owner.products.store');
    Route::get('/store-owner/products', [StoreOwnerController::class, 'index'])->name('store_owner.products');
    Route::get('/store-owner/products/{product}/edit', [StoreOwnerController::class, 'edit'])->name('store_owner.edit');
    Route::put('/store-owner/products/{product}', [StoreOwnerController::class, 'update'])->name('store_owner.update');
    Route::delete('/store-owner/products/{product}', [StoreOwnerController::class, 'destroy'])->name('store_owner.destroy');



});


Route::middleware(['auth', 'customer','throttle:100,1'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::post('/like/{product}', [CustomerController::class, 'toggleLike'])->name('like.toggle');
    Route::post('/comment/{product}', [CustomerController::class, 'addComment'])->name('comment.add');
    Route::get('/api/comments/{product}', [CustomerController::class, 'getLatestComments'])->name('api.comments.latest');

    // Keep existing route for viewing all comments page
    Route::get('/comments/{product}', [CustomerController::class, 'viewComments'])->name('comments.view');    Route::put('/comment/{comment}', [CustomerController::class, 'updateComment'])->name('comment.update');
    Route::delete('/comment/{comment}', [CustomerController::class, 'deleteComment'])->name('comment.delete');
});







require __DIR__.'/auth.php';
