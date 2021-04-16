<?php

use App\Http\Controllers\ProductController;

Route::get('products',[ProductController::class,'index'])->name('product.list');
Route::get('product/{id}',[ProductController::class,'show'])->name('product.show');
Route::post('product',[ProductController::class,'store'])->name('product.store');
Route::post('product/{id}',[ProductController::class,'update'])->name('product.update');
Route::delete('product/{id}',[ProductController::class,'delete'])->name('product.delete');
