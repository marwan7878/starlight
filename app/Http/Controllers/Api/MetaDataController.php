<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MetaDataResource;
use App\Models\Meta_data_pages;
use Illuminate\Http\Request;

class MetaDataController extends Controller
{
    public function index()
    {
        $metaData = Meta_data_pages::query();
        if(request()->has('category')){

            $metaData->whereHas('category', function ($q) {
                $q->where('name', 'LIKE', '%' . request('category') . '%');
            });
        }
        $metaData = $metaData->with('category')->get();

        return response()->json(MetaDataResource::collection($metaData), 200);

    }
}
