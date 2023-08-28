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
        $news = Event::with(['category' => function ($query) {
            $query->select('id','name_ar','name_en');
        }])
        ->get();
        return response()->json($news, 200);
    }

    public function show($id)
    {
        $event = Event::where('id' , $id)
            ->with(['category' => function ($query) {
            $query->select('id','name_ar','name_en');
        }])
        ->get();
        return response()->json($event, 200);
    }

    public function search(Request $request)
    {
        $event = Event::where('title', 'LIKE', "%{$request->title}%")->first();
        return response()->json($event, 200);
    }

}
