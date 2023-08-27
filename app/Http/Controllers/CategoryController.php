<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use File;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('Categories.index')->with('categories',$categories);
    }
    
    
    public function create()
    {
        return view('Categories.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required'
        ]);
        $image_name = $request->image->getClientOriginalName();
        $image_name = time().$image_name;
        $path = 'images/main/categories';
        $request->image->move($path,$image_name);


        Category::create([
            'name'=>$request->name,
            'image'=> $path.'/'.$image_name
        ]);
        return redirect()->route('category.index');
    }

    
    public function edit($id)
    {
        $category = Category::where('id',$id)->first();
        return view('Categories.edit')->with('category' , $category);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $category = Category::find($id)->first();
        $category->name = $request->name;

        if($request->image != null)
        {
            $image_path = public_path('images/main/categories/'.$category->image);
            if(File::exists($image_path))
                unlink($image_path);

            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/main/categories';
            $request->image->move($path , $image_name);
            
            $category->image = $path.'/'.$image_name;
        }

        $category->save();

        return redirect()->route('category.index'); 
    }
    
    public function delete($id)
    {
        $category = Category::find($id);    
        $category->delete();
        return redirect()->route('category.index');
    }

    public function search(Request $request)
    {
        $name = $request->name;
        $categories = Category::where('name', 'LIKE', '%'.$name.'%')
            ->paginate(10);
        return view('Categories.index')->with('categories',$categories);
    }
    public function archive_search(Request $request)
    {
        if($request->name == null)
        {
            $categories = Category::onlyTrashed()->paginate(10);
            return view('Categories.archive')->with('categories',$categories);
        }
        
        $name = $request->name;
        $categories = Category::onlyTrashed()->where('name_ar', 'LIKE', '%'.$name.'%')
            ->orWhere('name_en', 'LIKE', '%'.$name.'%')->paginate(10);    
        return view('Categories.archive',compact('categories'));
    }

}
