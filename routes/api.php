<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryStoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchasesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/login',[AuthController::class,'login']);//login
Route::post('/register',[AuthController::class,'register']);//register
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');//logout


Route::post('/user/image',[AuthController::class,'uploadImage'])->middleware('auth:sanctum');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('category/{id}',[CategoryStoreController::class,'getStores']); //4f//showing stores for each category

Route::get('/stores',[CategoryStoreController::class,'index']);//4f//show all stores
Route::post('/store/search',[CategoryStoreController::class,'search']);//1a//searching for stores
Route::get('store/{id}',[CategoryStoreController::class,'getProducts']);//4f//showing products for each store


Route::get('/products/top3',[ProductController::class,'top3']);//top 3
Route::post('/product/search',[ProductController::class,'search']);//1a//searching for products
Route::get('/product/{id}', [ProductController::class, 'show']); // لعرض منتج معين//2a

// Purchases

Route::post('/Purchases/store', [PurchasesController::class, 'store'])->middleware('auth:sanctum');//adding to purchases
Route::get('/Purchases/user', [PurchasesController::class, 'getPurchases'])->middleware('auth:sanctum');//showing all purchases for a user



