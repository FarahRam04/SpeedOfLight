<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');

Route::post('/products',[ProductController::class,'store']);
Route::get('/products/{id}', [ProductController::class, 'show']); // لعرض منتج معين





Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
