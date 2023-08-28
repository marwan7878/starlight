<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ApiProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category' => function ($query) {
            $query->select('id','name','image');
        }])
        ->get();
        return response()->json($products, 200);
    }

    public function show($id)
    {
        $product = Product::where('id' , $id)->first();
        return response()->json($product, 200);
    }
    public function filter(Request $request)
    {
        $products = Product::where('category_id' , 'LIKE' , "%{$request->category_id}%")
            ->get();
        return response()->json($products, 200);
    }
    public function search(Request $request)
    {
        $products = Product::where('title', 'LIKE', "%{$request->title}%")
            ->where('category_id' , 'LIKE' , "%{$request->category_id}%")
            ->get();
        return response()->json($products, 200);
    }
}
