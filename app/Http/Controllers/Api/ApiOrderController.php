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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'product_id' => 'required',
            'message' => 'required',
        ]);
        $product = Product::where('id',$request->product_id)->first();
        
        $ret = Order::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'product' => $product->title,
            'message' => $request->message
        ]);
        if($ret != null)
        {
            return response()->json(200);
        }
        else
        {
            return response()->json(404);
        }
    }

}
