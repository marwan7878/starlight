<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use File;


class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('Products.index',compact('products'))
            ->with('search_flag',true)
            ->with('search_flag2',true);
    }

    public function archive()
    {
        $products = Product::latest()->onlyTrashed()->paginate(10);
        return view('Products.archive')->with('products',$products)
            ->with('search_flag',true)
            ->with('search_flag2',true);
    }

    public function create()
    {
        $categories = Category::all();
        return view('Products.create',compact('categories'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request , [
            'title'=> 'required',
            'category_id'=> 'required',
            'images'=> 'required|array',
            'shortdescription'=> 'required',
            'description'=> 'required',
        ]);
        
        $images_name = [];
        $images_alt = [];
        $i = 0;
        foreach($request['images'] as $image)
        {
            $image_name = $image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/main/products';
            $image->move($path , $image_name);
            array_push($images_name , $path.'/'.$image_name);
            array_push($images_alt , $request->alt_text[$i]);
            $i++;
        }
        

        $social_image_name = "";
        if($request->social_image != null)
        {
            $social_image_name = $request->social_image->getClientOriginalName();
            $social_image_name = time().$social_image_name;
            $path = 'images/social/products';
            $request->social_image->move($path , $social_image_name);
        }
        
        Product::create([
            'title'=> $request->title,
            'category_id'=> $request->category_id,
            'images'=> $images_name,
            'shortdescription'=> $request->shortdescription,
            'description'=> $request->description,
            'alt_text'=> $images_alt,
            'focus_keyword'=> $request->focus_keyword,

            'social_title'=> $request->social_title,
            'social_image'=> $social_image_name,
            'social_decription'=> $request->social_decription,
            'social_alt_text'=> $request->social_alt_text,

            'meta_title'=> $request->meta_title,
            'meta_link'=> $request->meta_link,
            'meta_decription'=> $request->meta_decription,
        ]);
        return redirect()->route('Products.index');
    }
    
    public function edit($id)
    {
        $product = Product::where('id' , $id)->first();
        $categories = Category::all();
        return view('Products.edit',compact('categories'))->with('product' , $product);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'shortdescription' => 'required',
            'description' => 'required',
        ]);
        $product = Product::find($id);
        if($request->alt_text != null)
        {
            $images_alt = [];
            $i = 0;
            foreach($request['alt_text'] as $image)
            {
                array_push($images_alt , $request->alt_text[$i]);
                $i++;
            }
            $product->alt_text = $images_alt;
        }


        if($request->images != null)
        {
            $images_name = $product->images;
            $i = 0;
            $image_path = null;
            foreach($request['images'] as $image)
            {
                try {
                    $request['images'][$i];
                    $image_path = public_path($product->images[$i]);
                    if(File::exists($image_path))
                        unlink($image_path);
                
                    $image_name = $image->getClientOriginalName();
                    $image_name = time().$image_name;
                    $path = 'images/main/products';
                    $image->move($path , $image_name);
                    $images_name[$i] = $path.'/'.$image_name;

                } catch (\Exception $e) {
                    $image_name = $image->getClientOriginalName();
                    $image_name = time().$image_name;
                    $path = 'images/main/products';
                    $image->move($path , $image_name);
                    array_push($images_name , $path.'/'.$image_name);
                }
                $i++;
            }
            $product->images = $images_name;
        }
        
        
        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->focus_keyword = $request->focus_keyword;
        
        
        $product->social_title = $request->social_title;
        $product->social_description = $request->social_description;
        if($request->social_image != null)
        {
            $image_path = public_path($product->social_image);
            if(File::exists($image_path) && $product->social_image != null )
                unlink($image_path);
            
            $social_image_name = $request->social_image->getClientOriginalName();
            $social_image_name = time().$social_image_name;
            $path = 'images/social/news';
            $request->social_image->move($path , $social_image_name);
            $product->social_image = $path.'/'.$social_image_name;
        }
        $product->social_alt_text = $request->social_alt_text;
        
        
        $product->meta_title = $request->meta_title;
        $product->meta_link = $request->meta_link;
        $product->meta_description = $request->meta_description;

        $product->save();
        
        return redirect()->route('Products.index');
    }
    
    public function soft_delete($id)
    {
        $product = Product::find($id);    
        $product->delete();
        return redirect()->route('Products.index');
    }
    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);    
        $product->restore();
        return redirect()->route('Products.archive');
    }
    
    public function hard_delete($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first();
        foreach($product->images as $image)
        {
            $image_path = public_path($image);
            if(File::exists($image_path))
                unlink($image_path);
        }
        $social_image_path = public_path('images/social/products/'.$product->social_image);
        if(File::exists($social_image_path)) 
            unlink($social_image_path);
        
        $product->forceDelete();
        return redirect()->route('Products.archive'); 
    }
    public function search(Request $request)
    {
        return $this->live_search($request , 'description' , new Product() , 'Products' , 'products',false,'index');
    }
    public function archive_search(Request $request)
    {
        $this->description_search($request , 'description' , new Product() , 'Products' , 'products',true,'archive');
    }
    public function title_search(Request $request)
    {
        return $this->description_search($request , 'title' , new Product() , 'Products' , 'products',false,'index');
    }
    public function archive_title_search(Request $request)
    {
        return $this->description_search($request , 'title' , new Product() , 'Products' , 'products',true,'archive');
    }
    // public function searchByDate(Request $request)
    // {
    //     $date = $request->input('date');
      
    //     $news = News::where('created_at', 'LIKE', '%'.$date.'%')->paginate(10);
        
    //     return view('News.index')->with('news',$news)->with('search_flag',true)
    //         ->with('search_flag2' , true);
    // }

}

    

    