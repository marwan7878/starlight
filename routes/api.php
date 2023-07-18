<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiNewsController;
use App\Http\Controllers\Api\ApiJobController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiContactUsController;
use App\Http\Controllers\Api\ApiContentController;
use App\Http\Controllers\Api\ApiInfoController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Models\News;
use App\Models\Content;
use App\Models\Job;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Info;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//news
Route::prefix('news')->group(function () {
    Route::get('/' , [ApiNewsController::class,'index']);
    Route::get('/show/{id}' , [ApiNewsController::class,'show']);
    Route::get('/search', [ApiNewsController::class, 'search']);
});


//jobs
Route::prefix('jobs')->group(function () {
    Route::get('/' , [ApiJobController::class,'index']);
    Route::get('/show/{id}' , [ApiJobController::class,'show']);
    Route::get('/search', [ApiJobController::class, 'search']);
});


//catgories
Route::prefix('categories')->group(function () {
    Route::get('/' , [ApiCategoryController::class,'index']);
    Route::get('/show/{id}' , [ApiCategoryController::class,'show']);
    Route::get('/search/{id}', [ApiCategoryController::class, 'show']);
});


//infos
Route::prefix('infos')->group(function () {
    Route::get('/' , [ApiInfoController::class,'index']);
    Route::get('/show/{id}' , [ApiInfoController::class,'show']);
    Route::get('/search/{id}', [ApiInfoController::class, 'show']);
});

//contactus
Route::post('contactus/store' , [ApiContactUsController::class,'store']);

//order
Route::post('order/store' , [ApiOrderController::class,'store']);


Route::prefix('content')->group(function () {
    //header of pages 
    Route::get('/{home}/header' , [ApiContentController::class,'header']);
    Route::get('/{aboutus}/header' , [ApiContentController::class,'header']);
    Route::get('/{careers}/header' , [ApiContentController::class,'header']);
    //ourteam of careers page
    Route::get('/ourteam' , [ApiContentController::class,'ourteam']);

    Route::get('/aboutus/ceo' , [ApiContentController::class,'ceo']);
    Route::get('/aboutus/mission' , [ApiContentController::class,'mission']);
    Route::get('/aboutus/vision' , [ApiContentController::class,'vision']);
    Route::get('/home/{activity}' , [ApiContentController::class,'homeactivity']);
    Route::get('/{ourcompanies}/header' , [ApiContentController::class,'header']);
    Route::get('/ourcompanies/{activity}' , [ApiContentController::class,'ourcompanies']);
    Route::get('/ourcompanies/{experience}' , [ApiContentController::class,'ourcompanies']);
});
Route::prefix('content')->group(function () {
    //header of pages 
    Route::get('/{home}/header' , [ApiContentController::class,'header']);
    Route::get('/{aboutus}/header' , [ApiContentController::class,'header']);
    Route::get('/{careers}/header' , [ApiContentController::class,'header']);
    //reasons of careers page
    Route::get('/careers/{reason1}' , [ApiContentController::class,'reason']);
    Route::get('/careers/{reason2}' , [ApiContentController::class,'reason']);
    Route::get('/careers/{reason3}' , [ApiContentController::class,'reason']);
    //values of home page
    Route::get('/home/{value1}' , [ApiContentController::class,'value']);
    Route::get('/home/{value2}' , [ApiContentController::class,'value']);
    Route::get('/home/{value3}' , [ApiContentController::class,'value']);
});