<?php

use App\Http\Controllers\Api\LoginnController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PembelianController as ApiPembelianController;

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

// Route to get the authenticated user, requires "auth:sanctum" middleware
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Grouping the routes that require authentication using "auth:sanctum"
Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource("/Pembelian", ApiPembelianController::class);
});

// Routes for login and logout, not requiring authentication
Route::post("/login", [LoginnController::class, "Login"]);
Route::post("/logout", [LoginnController::class, "Logout"]);
