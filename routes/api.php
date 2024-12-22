<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryStoreController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/login',[AuthController::class,'login']);//login
Route::post('/register',[AuthController::class,'register']);//register
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');//logout
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('category/{id}',[CategoryStoreController::class,'getStores']); //4f//showing stores for each category

Route::post('/store/search',[CategoryStoreController::class,'search']);//1a//searching for stores
Route::get('store/{id}',[CategoryStoreController::class,'getProducts']);//4f//showing products for each store

Route::post('/product/store',[ProductController::class,'store']);//store a new product in the products table
Route::post('/product/search',[ProductController::class,'search']);//1a//searching for products
Route::get('/product/{id}', [ProductController::class, 'show']); // لعرض منتج معين//2a



