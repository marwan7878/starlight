<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use File;

class ContentController extends Controller
{
    
    public function header($page_name)
    {
        $header = Content::where('page_name',$page_name)->first();
        return view('Content.header')->with('header',$header);
    }
    public function reason($reason_index)
    {
        $reason = Content::where('page_name','careers')->where('type',$reason_index)->first();
        return view('Content.reasons')->with('reason',$reason);
    }
    public function value($value_index)
    {
        $value = Content::where('page_name','home')->where('type',$value_index)->first();
        return view('Content.values')->with('value',$value);
    }
    public function ourteam()
    {
        $team = Content::where('page_name','careers')->where('type','ourteam')->first();
        return view('Content.ourteam')->with('team',$team);
    }
    public function characteristic($characteristic_index)
    {

        $characteristic = Content::where('page_name','aboutus')->where('type',$characteristic_index)->first();
        return view('Content.characteristics')->with('characteristic',$characteristic);
    }
    public function ceo()
    {
        $ceo = Content::where('type','ceo')->first();
        return view('Content.ceo')->with('ceo',$ceo);
    }
    public function mission()
    {
        $mission = Content::where('type','mission')->first();
        return view('Content.mission&vision')->with('missionvision',$mission);
    }
    public function vision()
    {
        $vision = Content::where('type','vision')->first();
        return view('Content.mission&vision')->with('missionvision',$vision);
    }
    public function ourcompanies($type)
    {
        $content = Content::where('page_name','ourcompanies')->where('type',$type)->first();
        return view('Content.content')->with('content',$content);
    }
    public function homeactivity($type)
    {
        $content = Content::where('page_name','home')->where('type',$type)->first();
        return view('Content.content')->with('content',$content);
    }
    
    public function headerupdate(Request $request, $page_name)
    {
        $page = Content::where('page_name',$page_name)->first();

        $request->validate([
            'description_en' => 'required',
            'description_ar' => 'required'
        ]);
        
        if($request->image != null)
        {
            $image_path = public_path('images/content/'.$page->image);
            if(File::exists($image_path))
                unlink($image_path);

            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/content';
            $request->image->move($path , $image_name);
            
            $page->image = $image_name;
        }
        
        $page->description_en = $request->description_en;
        $page->description_ar = $request->description_ar;
        
        $page->save();

        return redirect()->route('home');
    }
    public function update(Request $request, $type)
    {
        $content = Content::where('page_name',$request->page_name)->where('type',$type)->first();
        
        $request->validate([
            'description_en' => 'required',
            'description_ar' => 'required'
        ]);

        if($request->image != null)
        {
            $image_path = public_path('images/content/'.$content->image);
            if(File::exists($image_path))
                unlink($image_path);

            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/content';
            $request->image->move($path , $image_name);
            
            $content->image = $image_name;
        }

        $content->description_en = $request->description_en;
        $content->description_ar = $request->description_ar;
        
        $content->save();

        return redirect()->route('home');
    }
    
}
