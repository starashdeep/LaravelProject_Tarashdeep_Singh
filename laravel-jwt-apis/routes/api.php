<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::post("/register", [ApiController::class, "register"])->name('apis.register');
// Route::post("/login", [ApiController::class, "login"])->name('apis.login');

// Route::middleware('auth:api')->group(function () {

//     Route::get("profileuser", [ApiController::class, "profile"])->name('profile');
//     Route::get("refresh", [ApiController::class, "refreshToken"]);
//     Route::get("logout", [ApiController::class, "logout"]);
// });
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', 'Apiontroller@login')->name('loginUser');
    Route::post('logout', 'ApiController@logout');
    Route::post('refresh', 'ApiController@refresh');
    Route::get('me', [ApiController::class, 'profile'])->name('me');
});