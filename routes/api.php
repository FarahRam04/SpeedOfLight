<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryStoreController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('category/{id}',[CategoryStoreController::class,'getStores']);
Route::get('store/{id}',[CategoryStoreController::class,'getProducts']);

Route::post('/product/store',[ProductController::class,'store']);
Route::get('/product/{id}', [ProductController::class, 'show']); // لعرض منتج معين

