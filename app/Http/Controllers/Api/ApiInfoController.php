<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;


class ApiInfoController extends Controller
{
    public function index()
    {
        $all_info = Info::get();
        foreach($all_info as $info){
            $data[$info->type] = $info->description;
        }
        return response()->json($data, 200);
    }

    public function show(Request $request)
    {
        $info = Info::where('type' , $request->type)->first();
        return response()->json($info, 200);
    }
}
