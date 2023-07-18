<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;



class ApiContactUsController extends Controller
{
    public function index()
    {
        $infos = ContactUs::all();
        return response()->json($infos, 200);
    }

    public function show($id)
    {
        $info = ContactUs::where('id' , $id)->first();
        return response()->json($info, 200);
    }
}
