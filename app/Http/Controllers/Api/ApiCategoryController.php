<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;



class ApiCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    public function show($id)
    {
        $category = Category::where('id' , $id)->first();
        return response()->json($category, 200);
    }
}
