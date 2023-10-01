<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Meta_data_pages;
use Illuminate\Http\Request;

class MetaDataPagesController extends Controller
{
    public function index()
    {
        $Meta_data = Meta_data_pages::paginate(10);
        return view('MetaData.index',compact('Meta_data'));
    }

    public function create()
    {
        $categories = category::all();
        return view('MetaData.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'link'=>'required',
            'description'=>'required'
        ]);
        $input = $request->all();
        if($request->hasFile('image')){
            $image_name = $request->file('image')->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/'.Meta_data_pages::IMAGE_PATH;
            $request->image->move($path,$image_name);
            $input['image'] = $path.'/'.$image_name;
        }
        Meta_data_pages::create($input);
        return redirect()->route('metadata.index');
    }


    public function edit($id)
    {
        $metadata = Meta_data_pages::where('id' , $id)->first();
        $categories = category::all();
        return view('MetaData.edit',compact('metadata','categories'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required',
            'link'=>'required',
            'description'=>'required'
        ]);
        $input = $request->all();
        if($request->hasFile('image')){
            $image_name = $request->file('image')->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/'.Meta_data_pages::IMAGE_PATH;
            $request->image->move($path,$image_name);
            $input['image'] = $path.'/'.$image_name;
        }
        $metadata = Meta_data_pages::find($id);

        $metadata->update($input);

        return redirect()->route('metadata.index');
    }

    public function delete($id)
    {
        $metadata = Meta_data_pages::where('id' , $id)->first();
        $metadata->delete();
        return redirect()->back();
    }
}
