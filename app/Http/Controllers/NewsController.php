<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use File;


class NewsController extends Controller
{
    
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('News.index',compact('news'))
            ->with('search_flag',true)
            ->with('search_flag2',true);
    }

    public function archive()
    {
        $news = News::latest()->onlyTrashed()->paginate(10);
        return view('News.archive')->with('news',$news)
            ->with('search_flag',true)
            ->with('search_flag2',true);
    }

    public function create()
    {
        $categories = Category::all();
        return view('News.create',compact('categories'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request , [
            'title'=> 'required',
            'category_id'=> 'required',
            'image'=> 'required',
            'description'=> 'required',
        ]);
        $image_name = $request->image->getClientOriginalName();
        $image_name = time().$image_name;
        $path = 'images/main/news';
        $request->image->move($path , $image_name);
        
        $social_image_name = "";
        if($request->social_image != null)
        {
            $social_image_name = $request->social_image->getClientOriginalName();
            $social_image_name = time().$social_image_name;
            $path = 'images/social/news';
            $request->social_image->move($path , $social_image_name);
        }
        
        
        News::create([
            'title'=> $request->title,
            'category_id'=> $request->category_id,
            'image'=> $image_name,
            'description'=> $request->description,
            'alt_text'=> $request->alt_text,
            'focus_keyword'=> $request->focus_keyword,

            'social_title'=> $request->social_title,
            'social_image'=> $social_image_name,
            'social_decription'=> $request->social_decription,
            'social_alt_text'=> $request->social_alt_text,

            'meta_title'=> $request->meta_title,
            'meta_link'=> $request->meta_link,
            'meta_decription'=> $request->meta_decription,
        ]);
        return redirect()->route('News.index');
    }
    
    public function show($id)
    {
        $event = News::where('id' , $id)->first();
        $event->description = $this->remove_tags($event->description); 
        return view('News.show')->with('event' , $event);
    }

    public function edit($id)
    {
        $event = News::where('id' , $id)->first();
        $categories = Category::all();
        return view('News.edit',compact('categories'))->with('event' , $event);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);
        $event = News::find($id);
        
        if($request->image != null)
        {
            $image_path = public_path('images/main/news/'.$event->image);
            if(File::exists($image_path))
                unlink($image_path);

            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/main/news';
            $request->image->move($path , $image_name);
            
            $event->image = $image_name;
        }
        
        
        $event->title = $request->title;
        $event->category_id = $request->category_id;
        $event->description = $request->description;
        $event->focus_keyword = $request->focus_keyword;
        $event->alt_text = $request->alt_text;
        
        
        $event->social_title = $request->social_title;
        $event->social_description = $request->social_description;
        if($request->social_image != null)
        {
            $image_path = public_path('images/social/news/'.$event->social_image);
            if(File::exists($image_path) && $event->social_image != null )
                unlink($image_path);

            $social_image_name = $request->social_image->getClientOriginalName();
            $social_image_name = time().$social_image_name;
            $path = 'images/social/news';
            $request->social_image->move($path , $social_image_name);
            $event->social_image = $social_image_name;
        }
        $event->social_alt_text = $request->social_alt_text;
        
        
        $event->meta_title = $request->meta_title;
        $event->meta_link = $request->meta_link;
        $event->meta_description = $request->meta_description;

        $event->save();
        
        return redirect()->route('News.index');
    }
    
    public function soft_delete($id)
    {
        $event = News::find($id);    
        $event->delete();
        return redirect()->route('News.index');
    }
    public function restore($id)
    {
        $event = News::withTrashed()->find($id);    
        $event->restore();
        return redirect()->route('News.archive');
    }
    
    public function hard_delete($id)
    {
        $event = News::onlyTrashed()->where('id', $id)->first();
        
        $image_path = public_path('images/main/news/'.$event->image);
        if(File::exists($image_path)) 
            unlink($image_path);
        $social_image_path = public_path('images/social/news/'.$event->social_image);
        if(File::exists($social_image_path)) 
            unlink($social_image_path);
        
        $event->forceDelete();
        return redirect()->route('News.archive'); 
    }
    public function search(Request $request)
    {
        return $this->description_search($request , 'description' , new News() , 'News' , 'news',false,'index');
    }
    public function archive_search(Request $request)
    {
        return $this->description_search($request , 'description' , new News() , 'News' , 'news',true,'archive');
    }
    public function title_search(Request $request)
    {
        return $this->description_search($request , 'title' , new News() , 'News' , 'news',false,'index');
    }
    public function archive_title_search(Request $request)
    {
        return $this->description_search($request , 'title' , new News() , 'News' , 'news',true,'archive');
    }
    public function searchByDate(Request $request)
    {
        $date = $request->input('date');
      
        $news = News::where('created_at', 'LIKE', '%'.$date.'%')->paginate(10);
        
        return view('News.index')->with('news',$news)->with('search_flag',true)
            ->with('search_flag2' , true);
    }

}

    

    