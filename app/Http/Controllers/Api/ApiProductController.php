<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ApiProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    public function show($id)
    {
        $product = Product::where('id' , $id)->first();
        return response()->json($product, 200);
    }

    public function search(Request $request)
    {
        // return response()->json($request->category_id, 200);
        $product = Product::where(['title', 'LIKE', $request->title],
            ['category_id' , 'LIKE' ,   $request->category_id])
            ->first();
        return response()->json($product, 200);
    }
}
