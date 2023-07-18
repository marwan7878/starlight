<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;



class ApiContentController extends Controller
{
    public function header($page_name)
    {
        $header = Content::where('page_name',$page_name)->first();
        return response()->json($header, 200);
    }
    public function reason($reason_index)
    {
        $reason = Content::where('page_name','careers')->where('type',$reason_index)->first();
        return response()->json($reason, 200);
    }
    public function value($value_index)
    {
        $value = Content::where('page_name','home')->where('type',$value_index)->first();
        return response()->json($value, 200);
    }
    public function ourteam()
    {
        $team = Content::where('page_name','careers')->where('type','ourteam')->first();
        return response()->json($team, 200);
    }
    
    //////
    public function characteristic($characteristic_index)
    {
        $characteristic = Content::where('page_name','aboutus')->where('type',$characteristic_index)->first();
        return response()->json($characteristic, 200);
    }
    public function ceo()
    {
        $ceo = Content::where('type','ceo')->first();
        return response()->json($ceo, 200);
    }
    public function mission()
    {
        $mission = Content::where('type','mission')->first();
        return response()->json($mission, 200);
    }
    public function vision()
    {
        $vision = Content::where('type','vision')->first();
        return response()->json($vision, 200);
    }
    public function ourcompanies($type)
    {
        $content = Content::where('page_name','ourcompanies')->where('type',$type)->first();
        return response()->json($content, 200);
    }
    public function homeactivity($type)
    {
        $content = Content::where('page_name','home')->where('type',$type)->first();
        return response()->json($content, 200);
    }
}
