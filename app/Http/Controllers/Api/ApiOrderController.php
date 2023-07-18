<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;


class ApiOrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'commodity' => 'required',
        ]);
        $ret = Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->city,
            'commodity' => $request->commodity
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
