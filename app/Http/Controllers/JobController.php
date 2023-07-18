<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->paginate(10);
        return view('Jobs.index')->with('jobs' , $jobs);
    }

    public function archive()
    {
        $jobs = Job::latest()->onlyTrashed()->paginate(10);
        return view('Jobs.archive')->with('jobs',$jobs);
    }

    
    public function create()
    {
        return view('Jobs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'address'=>'required',
            'description'=>'required',
        ]);
        Job::create([
            'title'=>$request->title,
            'address'=>$request->address,
            'description'=>$request->description,
            'alt_text'=> $request->alt_text,
            'focus_keyword'=> $request->focus_keyword,

            'social_title'=> $request->social_title,
            'social_address'=> $request->social_address,
            'social_decription'=> $request->social_decription,
            'social_alt_text'=> $request->social_alt_text,

            'meta_title'=> $request->meta_title,
            'meta_link'=> $request->meta_link,
            'meta_decription'=> $request->meta_decription,
        ]);
        return redirect()->route('Jobs.index');
    }

    
    public function show(Job $job)
    {
        $job = Job::where('id' , $id)->first();
        return view('Jobs.show')->with('job' , $job);
    }
    
    
    public function edit($id)
    {
        $job = Job::find($id)->first();
        return view('Jobs.edit')->with('job' , $job);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'address'=>'required',
            'description'=>'required'
        ]);
        $job = Job::find($id);
        $job->title = $request->title;
        $job->address = $request->address;
        $job->description = $request->description;
        $job->focus_keyword = $request->focus_keyword;
        $job->alt_text = $request->alt_text;
        
        $job->social_title = $request->social_title;
        $job->social_address = $request->social_address;
        $job->social_description = $request->social_description;
        $job->social_alt_text = $request->social_alt_text;
        
        $job->meta_title = $request->meta_title;
        $job->meta_link = $request->meta_link;
        $job->meta_description = $request->meta_description;

        $job->save();

        return redirect()->route('Jobs.index');
    }

    public function soft_delete($id)
    {
        $job = Job::find($id);    
        $job->delete();
        return redirect()->back();
    }
    public function restore($id)
    {
        $job = Job::withTrashed()->find($id);    
        $job->restore();
        return redirect()->back();
    }

    public function hard_delete($id)
    {

        
        Job::where('id', $id)->forceDelete();
        return redirect()->back(); 
    }
    public function search(Request $request)
    {
        return $this->description_search($request , 'title' , new Job() , 'Jobs' , 'jobs',false,'index');
    }
    public function archive_search(Request $request)
    {
        return $this->description_search($request , 'title' , new Job() , 'Jobs' , 'jobs',true,'archive');
    }
}
