<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\BookController;
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

Route::get('/', [LibraryController::class, 'index'])->name('libraries.index');
Route::get('/libraries/create', [LibraryController::class, 'create'])->name('libraries.create');
Route::post('/libraries/store', [LibraryController::class, 'store'])->name('libraries.store');

Route::get('/libraries/{id}/edit', [LibraryController::class, 'edit'])->name('libraries.edit');
Route::put('/libraries/{id}/update', [LibraryController::class, 'update'])->name('libraries.update');
Route::get('/libraries/{id}/show', [LibraryController::class, 'show'])->name('libraries.show');

Route::delete('/libraries/{id}/destroy', [LibraryController::class, 'destroy'])->name('libraries.destroy');


Route::get('/libraries/bookCreate', [BookController::class, 'create'])->name('books.create');
Route::post('/libraries/bookStore', [BookController::class, 'store'])->name('books.store');
Route::get('/libraries/{book}/bookEdit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/libraries/{book}/bookUpdate', [BookController::class, 'update'])->name('books.update');
Route::delete('/libraries/{book}/bookDestroy', [BookController::class, 'destroy'])->name('books.destroy');
