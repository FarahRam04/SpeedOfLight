<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchForStoresRequest;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;

class CategoryStoreController extends Controller
{
    public function getStores($id){
        $stores=Category::query()->findOrFail($id)->stores;
        return response()->json($stores,200);
    }
    public function getProducts($id){
        $products=Store::query()->findOrFail($id)->products;
        return response()->json($products,200);
    }

    public function search(SearchForStoresRequest $request)
    {
        $store_name = $request->validated('name');
        $stores = Store::where('name', $store_name)->get();
        if ($stores->isEmpty()) {
            return response()->json(['message' => 'No stores found'], 404);
        }
        return response()->json($stores,200);
    }
}
