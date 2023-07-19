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
            'product_id' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $product = Product::where('id',$request->product_id)->first();
        
        $ret = Order::create([
            'email' => $request->email,
            'product' => 'aaa',
            'message' => $request->message
        ]);
        if($ret != null)
        {
            // return response()->json(200);
            return response()->json(200);
        }
        else
        {
            return response()->json(404);
        }
    }

}
