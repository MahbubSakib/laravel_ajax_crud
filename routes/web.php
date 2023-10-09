<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [App\Http\Controllers\ProductController::class, 'product'])->name('product');
Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'addProduct'])->name('add.product');
Route::post('/update-product', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('update.product');
