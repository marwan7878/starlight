<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;


class ApiContactUsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'first_name' => 'required',
            'second_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);
        $ret = ContactUs::create([
            'company_name' => $request->company_name,
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
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
