<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryStoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('stories/{id}',[CategoryStoreController::class,'getStores']);
Route::get('products/{id}',[CategoryStoreController::class,'getProduct']);
