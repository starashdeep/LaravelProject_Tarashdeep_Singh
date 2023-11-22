<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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
    return view('register');
})->name('/register');
Route::get('/', function () {
    return view('login');
});
Route::post("/login", [ApiController::class, "login"])->name('login');

// Route::middleware('auth:JWT')->group(function () {
//     Route::get('/profile', [ApiController::class, 'profile'])->name('profile');
// });

Route::middleware('auth:api')->group(function () {

    Route::get("refresh", [ApiController::class, "refreshToken"]);
    Route::get("logout", [ApiController::class, "logout"]);
});