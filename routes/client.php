<?php

use App\Http\Controllers\ClientController;

Route::get('clients',[ClientController::class,'index'])->name('client.list');
Route::get('client/{id}',[ClientController::class,'show'])->name('client.show');
Route::post('client',[ClientController::class,'store'])->name('client.store');
Route::put('client/{id}',[ClientController::class,'update'])->name('client.update');
Route::delete('client/{id}',[ClientController::class,'delete'])->name('client.delete');
