<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChildController;
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

//children routes
Route::get('/', [ChildController::class, 'index'])->name('children.index');
Route::get('/children/create', [ChildController::class, 'create'])->name('children.create');
Route::post('/children/store', [ChildController::class, 'store'])->name('children.store');

Route::get('/children/{id}/edit', [ChildController::class, 'edit'])->name('children.edit');
Route::put('/children/{id}/update', [ChildController::class, 'update'])->name('children.update');
Route::get('/children/{id}/show', [ChildController::class, 'show'])->name('children.show');

Route::delete('/children/{id}/destroy', [ChildController::class, 'destroy'])->name('children.destroy');

Route::get('children/guardian/details', [ChildController::class, 'guardianindex'])->name('guardian.index');