<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use File;


class ArticleController extends Controller
{
    
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('Articles.index',compact('articles'))
            ->with('search_flag',true)
            ->with('search_flag2',true);
    }

    public function archive()
    {
        $articles = Article::latest()->onlyTrashed()->paginate(10);
        return view('Articles.archive')->with('articles',$articles)
            ->with('search_flag',true)
            ->with('search_flag2',true);
    }

    public function create()
    {
        $categories = Category::all();
        return view('Articles.create',compact('categories'));
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
        $path = 'images/main/articles';
        $request->image->move($path , $image_name);
        
        $social_image_name = "";
        if($request->social_image != null)
        {
            $social_image_name = $request->social_image->getClientOriginalName();
            $social_image_name = time().$social_image_name;
            $path = 'images/social/articles';
            $request->social_image->move($path , $social_image_name);
        }
        
        
        Article::create([
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
        return redirect()->route('Articles.index');
    }
    
    public function show($id)
    {
        $article = Article::where('id' , $id)->first();
        $article->description = $this->remove_tags($article->description); 
        return view('Articles.show')->with('article' , $article);
    }

    public function edit($id)
    {
        $article = Article::where('id' , $id)->first();
        $categories = Category::all();
        return view('Articles.edit',compact('categories'))->with('article' , $article);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);
        $article = Article::find($id);
        
        if($request->image != null)
        {
            $image_path = public_path('images/main/articles/'.$article->image);
            if(File::exists($image_path))
                unlink($image_path);

            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/main/articles';
            $request->image->move($path , $image_name);
            
            $article->image = $image_name;
        }
        
        
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->description = $request->description;
        $article->focus_keyword = $request->focus_keyword;
        $article->alt_text = $request->alt_text;
        
        
        $article->social_title = $request->social_title;
        $article->social_description = $request->social_description;
        if($request->social_image != null)
        {
            $image_path = public_path('images/social/articles/'.$article->social_image);
            if(File::exists($image_path) && $article->social_image != null )
                unlink($image_path);

            $social_image_name = $request->social_image->getClientOriginalName();
            $social_image_name = time().$social_image_name;
            $path = 'images/social/articles';
            $request->social_image->move($path , $social_image_name);
            $article->social_image = $social_image_name;
        }
        $article->social_alt_text = $request->social_alt_text;
        
        
        $article->meta_title = $request->meta_title;
        $article->meta_link = $request->meta_link;
        $article->meta_description = $request->meta_description;

        $article->save();
        
        return redirect()->route('Articles.index');
    }
    
    public function soft_delete($id)
    {
        $article = Article::find($id);    
        $article->delete();
        return redirect()->route('Articles.index');
    }
    public function restore($id)
    {
        $article = Article::withTrashed()->find($id);    
        $article->restore();
        return redirect()->route('Articles.archive');
    }
    
    public function hard_delete($id)
    {
        $article = Article::onlyTrashed()->where('id', $id)->first();
        
        $image_path = public_path('images/main/articles/'.$article->image);
        if(File::exists($image_path)) 
            unlink($image_path);
        $social_image_path = public_path('images/social/articles/'.$article->social_image);
        if(File::exists($social_image_path)) 
            unlink($social_image_path);
        
        $article->forceDelete();
        return redirect()->route('Articles.archive'); 
    }
    public function search(Request $request)
    {
        return $this->description_search($request , 'description' , new Article() , 'Articles' , 'articles',false,'index');
    }
    public function archive_search(Request $request)
    {
        return $this->description_search($request , 'description' , new Article() , 'Articles' , 'articles',true,'archive');
    }
    public function title_search(Request $request)
    {
        return $this->description_search($request , 'title' , new Article() , 'Articles' , 'articles',false,'index');
    }
    public function archive_title_search(Request $request)
    {
        return $this->description_search($request , 'title' , new Article() , 'Articles' , 'articles',true,'archive');
    }


}

    

    