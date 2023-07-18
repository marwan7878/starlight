<?php

namespace App\Http\Controllers;

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
        return view('MetaData.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'meta_title'=>'required',
            'meta_link'=>'required',
            'meta_description'=>'required'
        ]);
        Meta_data_pages::create([
            'title'=> $request->meta_title,
            'link'=> $request->meta_link,
            'description'=> $request->meta_decription
        ]);
        return redirect()->route('metadata.index');
    }

   
    public function edit($id)
    {
        $metadata = Meta_data_pages::where('id' , $id)->first();
        return view('MetaData.edit',compact('metadata'));
    }
    
    public function update(Request $request,$id)
    {
        $request->validate([
            'meta_title'=>'required',
            'meta_link'=>'required',
            'meta_description'=>'required'
        ]);
        $metadata = Meta_data_pages::find($id);
        
        $metadata->title = $request->meta_title;
        $metadata->link = $request->meta_link;
        $metadata->description = $request->meta_description;
        
        $metadata->save();
        
        return redirect()->route('metadata.index');
    }
    
    public function delete($id)
    {
        $metadata = Meta_data_pages::where('id' , $id)->first();
        $metadata->delete();
        return redirect()->back(); 
    }
}
