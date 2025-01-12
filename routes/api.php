<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;

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


// product
Route::get("/product", [ProductController::class, 'index']);
Route::post("/product", [ProductController::class, 'store']);
Route::put("/product/{id}", [ProductController::class, 'update']);
Route::delete("/product/{id}", [ProductController::class, 'destroy']);


// User
Route::get("/users", [UserController::class, 'index']);
Route::post("/users", [UserController::class, 'store']);
Route::put("/users/{id}", [UserController::class, 'update']);
Route::delete("/users/{id}", [UserController::class, 'destroy']);

// Kategoris
Route::get("/kategoris", [KategoriController::class, 'index']);
Route::post("/kategoris", [KategoriController::class, 'store']);
Route::put("/kategoris/{id}", [KategoriController::class, 'update']);
Route::delete("/kategoris/{id}", [KategoriController::class, 'destroy']);