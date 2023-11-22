<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/storage/products/{id}/edit', [ProductController::class, 'edit']);
Route::put('/storage/products/{id}/update', [ProductController::class, 'update']);
Route::get('/storage/products/{id}/show', [ProductController::class, 'show']);
Route::get('/storage/products/archive', [ProductController::class, 'archive'])->name('products.archive');
Route::get('storage/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');

Route::delete('storage/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');;
Route::delete('storage/products/{id}/forcedelete', [ProductController::class, 'forcedelete'])->name('products.forcedelete');;

