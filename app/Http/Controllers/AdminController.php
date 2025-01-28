<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function addStore(Request $request)
    {
        if (! Auth::user()->hasPermissionTo('add stores')) {
            return response()->json(['error' => 'You do not have permission to add stores'], 403);
        }

        $storeAttributes=$request->validate([
            'name'=>'required',
            'category_id'=>'required|numeric',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imagePath = $request->file('image')->store('images', 'public');
        $newStore=Store::create([
            'name'=>$storeAttributes['name'],
            'category_id'=>$storeAttributes['category_id'],
            'image'=>$imagePath,
        ]);
        $newStore->save();
        return response()->json([
            'message' => 'Store added successfully',
            'store' => $newStore
        ], 201);

    }
}
