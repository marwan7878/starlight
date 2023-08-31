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
        $categories = Category::all();
        if($request->title == null && $request->category_id == null)
        {
            $products = Product::all();
            return response()->json(['categories'=>$categories , 'products'=>$products], 200);
        }    
        if($request->title == null && $request->category_id != null)
        {
            $products = Product::where('category_id' , 'LIKE' , "%{$request->category_id}%")->get();
            return response()->json(['categories'=>$categories , 'products'=>$products], 200);
        }
        $products = Product::where('title', 'LIKE', "%{$request->title}%")
            ->where('category_id' , 'LIKE' , "%{$request->category_id}%")
            ->get();

        return response()->json(['categories'=>$categories , 'products'=>$products], 200);
    }
}
