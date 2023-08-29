<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;



class InfoController extends Controller
{
    
    public function index()
    {
        $all_info = Info::latest()->paginate(10);
        return view('Info.index')->with('all_info' , $all_info);
    }
    public function archive()
    {
        $all_info = Info::latest()->onlyTrashed()->paginate(10);
        return view('Info.archive')->with('all_info',$all_info);
    }
    public function create()
    {
        $types = ['--none--' , 'address' , 'email' , 'phone'];
        return view('Info.create',compact('types'));
    }
    
    public function store(Request $request)
    {
        $types = ['--none--' , 'address' , 'email' , 'phone'];
        if($request->type_index == 0)
        {
            return redirect()->back()->withErrors(['msg' => 'Please ,select type']);
        }
        else
        {
            $this->validate($request,[
                'description' => 'required'
            ]);

            Info::create([
                'type' => $types[$request->type_index],
                'description' => $request->description
            ]);
            return redirect()->route('info.index');
        }
    }

    public function edit($id)
    {
        $info = Info::where('id' , $id)->first();
        $types = ['--none--' , 'address' , 'email' , 'phone'];
        return view('Info.edit')->with('info',$info)->with('types',$types);
    }

    public function update(Request $request ,$id)
    {
        $request->validate([
            'type' => 'required',
            'description' => 'required'
        ]);
        $info = Info::find($id);
        $info->type = $request->type;
        $info->description = $request->description;
        $info->save();

        return redirect()->route('info.index'); 
    }

    public function soft_delete($id)
    {
        $info = Info::find($id);
        $info->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $info = Info::withTrashed()->find($id);
        $info->restore();
        return redirect()->back();
    }

    public function hardDelete($id)
    {
        $info = Info::onlyTrashed()->find($id);
        $info->forceDelete();
        return redirect()->back();
    }
    public function search(Request $request)
    {
        $description = $request->description;
        $all_info = Info::where('description', 'LIKE', '%'.$description.'%')->paginate(10);
        return view('Info.index')->with('all_info',$all_info);
    }
    public function archive_search(Request $request)
    {
        $description = $request->description;
        $all_info = Info::onlyTrashed()->where('description', 'LIKE', '%'.$description.'%')->paginate(10);
        return view('Info.archive')->with('all_info',$all_info);
    }
}
