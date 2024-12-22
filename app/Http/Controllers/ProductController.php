<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // تحقق من صحة البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'store_id' => 'required|exists:stores,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // رفع الصورة وتخزين مسارها
        $imagePath = $request->file('image')->store('images', 'public');

        // إنشاء المنتج
        $product = Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'store_id' => $validated['store_id'],
            'image' => $imagePath,
        ]);

        // إعادة الاستجابة
        return response()->json(['message' => 'تم إضافة المنتج بنجاح!', 'product' => $product], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'المنتج غير موجود'], 404);
        }

        // تضمين رابط الصورة الكامل
        $product->image_url = asset('storage/' . $product->image);

        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
