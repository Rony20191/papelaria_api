<?php

use App\Http\Controllers\OrderController;

Route::get('orders',[OrderController::class,'index'])->name('order.list');
Route::get('order/{id}',[OrderController::class,'show'])->name('order.show');
Route::post('order',[OrderController::class,'store'])->name('order.store');
Route::put('order/{id}',[OrderController::class,'update'])->name('order.update');
Route::delete('order/{id}',[OrderController::class,'delete'])->name('order.delete');
