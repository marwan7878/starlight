<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use File;


class EventController extends Controller
{
    
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('Events.index',compact('events'))
            ->with('search_flag',true)
            ->with('search_flag2',true);
    }

    public function archive()
    {
        $events = Event::latest()->onlyTrashed()->paginate(10);
        return view('Events.archive')->with('events',$events)
            ->with('search_flag',true)
            ->with('search_flag2',true);
    }

    public function create()
    {
        return view('Events.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request , [
            'title'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
        ]);
        $image_name = $request->image->getClientOriginalName();
        $image_name = time().$image_name;
        $path = 'images/main/events';
        $request->image->move($path , $image_name);
        
        $social_image_name = "";
        if($request->social_image != null)
        {
            $social_image_name = $request->social_image->getClientOriginalName();
            $social_image_name = time().$social_image_name;
            $path = 'images/social/events';
            $request->social_image->move($path , $social_image_name);
        }
        
        
        Event::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'image'=> $image_name,
            'alt_text'=> $request->alt_text,
            'focus_keyword'=> $request->focus_keyword,

            'social_title'=> $request->social_title,
            'social_decription'=> $request->social_decription,
            'social_image'=> $social_image_name,
            'social_alt_text'=> $request->social_alt_text,

            'meta_title'=> $request->meta_title,
            'meta_link'=> $request->meta_link,
            'meta_decription'=> $request->meta_decription,
        ]);
        return redirect()->route('Events.index');
    }
    
    public function edit($id)
    {
        $event = Event::where('id' , $id)->first();
        return view('Events.edit')->with('event' , $event);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $event = Event::find($id);
        
        if($request->image != null)
        {
            $image_path = public_path('images/main/events/'.$event->image);
            if(File::exists($image_path))
                unlink($image_path);

            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/main/events';
            $request->image->move($path , $image_name);
            
            $event->image = $image_name;
        }
        
        $event->title = $request->title;
        $event->description = $request->description;
        $event->focus_keyword = $request->focus_keyword;
        
        $event->alt_text = $request->alt_text;
        
        
        $event->social_title = $request->social_title;
        $event->social_description = $request->social_description;
        if($request->social_image != null)
        {
            $image_path = public_path('images/social/events/'.$event->social_image);
            if(File::exists($image_path) && $event->social_image != null )
                unlink($image_path);

            $social_image_name = $request->social_image->getClientOriginalName();
            $social_image_name = time().$social_image_name;
            $path = 'images/social/events';
            $request->social_image->move($path , $social_image_name);
            $article->social_image = $social_image_name;
        }
        $event->social_alt_text = $request->social_alt_text;
        
        
        $event->meta_title = $request->meta_title;
        $event->meta_link = $request->meta_link;
        $event->meta_description = $request->meta_description;

        $event->save();
        
        return redirect()->route('Events.index');
    }
    
    public function soft_delete($id)
    {
        $event = Event::find($id);    
        $event->delete();
        return redirect()->route('Events.index');
    }
    public function restore($id)
    {
        $event = Event::withTrashed()->find($id);    
        $event->restore();
        return redirect()->route('Events.archive');
    }
    
    public function hard_delete($id)
    {
        $event = Event::onlyTrashed()->where('id', $id)->first();
        
        $image_path = public_path('images/main/events/'.$event->image);
        if(File::exists($image_path)) 
            unlink($image_path);
        $social_image_path = public_path('images/social/events/'.$event->social_image);
        if(File::exists($social_image_path)) 
            unlink($social_image_path);
        
        $event->forceDelete();
        return redirect()->route('Events.archive'); 
    }
    // public function search(Request $request)
    // {
    //     return $this->description_search($request , 'description' , new Article() , 'Articles' , 'articles',false,'index');
    // }
    // public function archive_search(Request $request)
    // {
    //     return $this->description_search($request , 'description' , new Article() , 'Articles' , 'articles',true,'archive');
    // }
    // public function title_search(Request $request)
    // {
    //     return $this->description_search($request , 'title' , new Article() , 'Articles' , 'articles',false,'index');
    // }
    // public function archive_title_search(Request $request)
    // {
    //     return $this->description_search($request , 'title' , new Article() , 'Articles' , 'articles',true,'archive');
    // }


}

    

    