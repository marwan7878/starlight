<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ApiProductController extends Controller
{
    public function show($id)
    {
        $product = Product::where('id' , $id)->first();
        return response()->json($product, 200);
    }
    public function search(Request $request)
    {
        if($request->title == null && $request->category_id == null)
        {
            $products = Product::all();
            return response()->json($products, 200);
        }    
        if($request->title == null && $request->category_id != null)
        {
            $products = Product::where('category_id' , 'LIKE' , "%{$request->category_id}%")->get();
            return response()->json($products, 200);
        }
        $products = Product::where('title', 'LIKE', "%{$request->title}%")
            ->where('category_id' , 'LIKE' , "%{$request->category_id}%")
            ->get();
        return response()->json($products, 200);
    }
}
