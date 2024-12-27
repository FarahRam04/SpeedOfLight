<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchasesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            '*.product_id' => 'required|integer',
            '*.quantity' => 'required|integer',
        ]);

        foreach ($request->all() as $purchaseData) {
            $purchaseData['user_id'] = Auth::id();
            Purchase::create($purchaseData);
        }
        return response()->json(['message'=>'Purchases added successfully.'],200);

    }

    public function getPurchases(){
        $purchases=User::query()->findOrFail(Auth::id())
            ->purchases()->with('product')
            ->get()->map(function($purchase){
                return $purchase->product;
            });
        return response()->json($purchases,200);
    }
}
