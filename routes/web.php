<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\AdminController;
use App\Models\ProductController;


Route::get('/',[EcommerceController::class,'index' ])->name('/');
Route::get('/product-details/{id}',[EcommerceController::class,'productDetails'])->name('product-details');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('/add-product',[ProductController::class,'addProduct'])->name('add-product');
    Route::get('/manage-product',[ProductController::class,'manageProduct'])->name('manage-product');
    Route::post('/new-product',[ProductController::class,'saveProduct'])->name('new-product');
    Route::get('/status/{id}',[ProductController::class,'status'])->name('status');
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
    Route::post('/update-product',[ProductController::class,'updateProduct'])->name('update-product');
    Route::post('/delete',[ProductController::class,'productDelete'])->name('delete');
});


