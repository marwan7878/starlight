<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;



class ApiEventController extends Controller
{
    public function index()
    {
        $news = Event::latest()->get();
        return response()->json($news, 200);
    }

    public function show($id)
    {
        $event = Event::where('id' , $id)->first();
        return response()->json($event, 200);
    }
}
