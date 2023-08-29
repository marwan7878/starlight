<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Info;
use App\Models\Category;
use App\Models\Event;



class ApiContentController extends Controller
{
    public function home()
    {
        $contents = Content::where([['page_name','home']])->get();
        $categories = Category::all();
        $events = Event::all();
        $data = array();

        
        foreach($contents as $content)
        {
            $data[$content->type] = ['image' => $content->image_link ,'desc' => $content->description];
        }
        foreach($categories as $category)
        {
            $data['categories'][] = ['id'=>$category->id,'name' => $category->name ,'image' => $category->image_url];
        }
        foreach($events as $event)
        {
            $data['events'][] = ['id'=>$event->id,'title' => $event->title 
            ,'image' => $event->image_url , 'shortdescription'=>$event->shortdescription
            ,'created_at'=>$event->created_at];
        }
        return response()->json($data, 200);
    }
    public function aboutus()
    {
        $contents = Content::where([['page_name','aboutus']])->get();
        $all_info = Info::all();
        $data = array();

        foreach($contents as $content)
        {
            $data[$content->type] = ['image' => $content->image_link ,'desc' => $content->description];
        }
        foreach($all_info as $info)
        {
            $data['info'][] = ['type' => $info->type ,'desc' => $info->description];
        }
        return response()->json($data, 200);
    }
    
}
