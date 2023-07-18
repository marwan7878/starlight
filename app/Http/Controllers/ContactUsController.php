<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    
    public function index()
    {
        $all_messages = ContactUs::latest()->paginate(10);
        return view('ContactUs.index')->with('all_messages' , $all_messages);
    }

    public function archive()
    {
        $all_messages = ContactUs::latest()->onlyTrashed()->paginate(10);
        return view('ContactUs.archive')->with('all_messages',$all_messages);
    }
    
    public function show($id)
    {
        $message = ContactUs::where('id' , $id)->first();
        $message->read = '1';
        $message->save();
        return view('ContactUs.show')->with('message' , $message); 
    }
    
    

    public function soft_delete($id)
    {
        $message = ContactUs::find($id);
        $message->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $message = ContactUs::withTrashed()->find($id);
        $message->restore();
        return redirect()->back();
    }

    public function hardDelete($id)
    {
        $message = ContactUs::find($id);
        $message->forceDelete();
        return redirect()->back();
    }
    public function search(Request $request)
    {
        $all_messages = ContactUs::where('company_name', 'LIKE', '%'.$request->company_name.'%')
            ->where('first_name','LIKE','%'.$request->first_name.'%')->paginate(10);
        return view('ContactUs.index')->with('all_messages',$all_messages);
    }
    public function archive_search(Request $request)
    {
        $all_messages = ContactUs::onlyTrashed()->where('company_name', 'LIKE', '%'.$request->company_name.'%')
            ->where('first_name','LIKE','%'.$request->first_name.'%')->paginate(10);
        return view('ContactUs.archive')->with('all_messages',$all_messages);
    }

}
