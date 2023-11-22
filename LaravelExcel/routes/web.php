<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('excel');
});
Route::get('excel', function(){
    return view('excel');
});
Route::get('export-user',[UserController::class, 'exportUser'])->name('export-user');
Route::post('import-user',[UserController::class, 'importUser'])->name('import-user');
