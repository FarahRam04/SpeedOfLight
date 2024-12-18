<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getStores($id){
        $stores=Category::query()->findOrFail($id)->stores;
        return response()->json($stores,200);
    }
    public function getProduct($id){
        $products=Store::query()->findOrFail($id)->products;
        return response()->json($products,200);
    }
}
