<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Route untuk login
Route::post('login', [AuthController::class, 'login']);

// Route yang memerlukan otentikasi JWT
Route::group(['middleware' => 'auth.jwt'], function () {
    // Route untuk mendapatkan informasi pengguna yang diautentikasi
    Route::get('me', [AuthController::class, 'me']);

    // Route untuk logout
    Route::post('logout', [AuthController::class, 'logout']);
});

// Route lain yang telah ada
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
