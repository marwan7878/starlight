<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;


class ApiOrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'product_id' => 'required',
            'message' => 'required|string',
        ]);
        $product = Product::where('id',$request->product_id)->first();
        
        $ret = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'product' => $product->title,
            'message' => $request->message
        ]);
        if($ret != null)
        {
            return response()->json(['message'=> 'Form sent successfully'],200);
        }
        else
        {
            return response()->json(['message'=> 'Error in sending'],404);
        }
    }

}
