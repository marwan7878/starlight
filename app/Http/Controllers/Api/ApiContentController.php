<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Info;
use App\Models\Category;
use App\Models\Event;
use App\Models\Product;



class ApiContentController extends Controller
{
    public function home()
    {
        $contents = Content::where([['page_name','home']])->get();
        $categories = Category::all();
        $categories_products = Category::with('products')->inRandomOrder()->take(3)->get();
        $events = Event::select('id','title','shortdescription','image','created_at')->inRandomOrder()->limit(2)->get();
        
        $data = array();
        
        
        foreach($contents as $content)
        {
            $data[$content->type] = ['image' => $content->image_link ,'desc' => $content->description];
        }

        foreach($categories as $category)
        {
            $data['categories'][] = ['id'=>$category->id,'name' => $category->name ,'image' => $category->image_url];
        }
        foreach($categories_products as $category)
        {
            $data['categories_products'][] = [
                'id'=>$category->id,
                'name' => $category->name ,
                'image' => $category->image_url,
                'products' => $category->products->take(4)
            ];
            // $products = Product::where('category_id',$category->id)->select('id','title','shortdescription','images')->limit(4)->get();
            // $data['categories_products']['products'][] = $category->products;
        }
        $data['events'] =  $events;
        $data['categories'] =  $categories;

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
            $data['info'][$info->type] =  $info->description;
        }
        return response()->json($data, 200);
    }
    
}
