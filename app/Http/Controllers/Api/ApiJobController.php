<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;


class ApiJobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return response()->json($jobs, 200);
    }

    public function show($id)
    {
        $job = Job::where('id' , $id)->first();
        return response()->json($job, 200);
    }

    public function search(Request $request)
    {
        $job = Job::where('title', 'LIKE', "%{$request->title}%")->first();
        return response()->json($job, 200);
    }
}
