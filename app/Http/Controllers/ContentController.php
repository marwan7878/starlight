<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use File;

class ContentController extends Controller
{
    public function content(Request $request)
    {
        $content = Content::where([['page_name',$request->page_name],['type',$request->type]])->first();
        return view('Content.content')->with('content',$content);
    }
    public function update(Request $request)
    {
        $content = Content::where([['page_name',$request->page_name],['type',$request->type]])->first();
        
        $request->validate([
            'description' => 'required'
        ]);
        

        if($request->image != null)
        {
            $image_path = public_path($content->image);
            if(File::exists($image_path))
                unlink($image_path);

            $image_name = time().'image.jpg';
            $path = 'images/content';
            $request->image->move($path , $image_name);
            
            $content->image = $path.'/'.$image_name;
        }
        
        $content->description = $request->description;
        
        $content->save();

        return redirect()->route('home');
    }
    
}
