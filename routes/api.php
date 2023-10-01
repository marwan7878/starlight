<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiEventController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiContactUsController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiContentController;
use App\Http\Controllers\Api\ApiInfoController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Http\Middleware\SanitizeInput;
use App\Http\Controllers\Api\MetaDataController;
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

//products
Route::prefix('products')->group(function () {
    Route::get('/' , [ApiProductController::class,'search']);
    Route::get('/show/{id}' , [ApiProductController::class,'show']);
});

//news
Route::prefix('events')->group(function () {
    Route::get('/' , [ApiEventController::class,'index']);
    Route::get('/show/{id}' , [ApiEventController::class,'show']);
    Route::get('/search', [ApiEventController::class, 'search']);
});



//catgories
Route::prefix('categories')->group(function () {
    Route::get('/' , [ApiCategoryController::class,'index']);
    Route::get('/show/{id}' , [ApiCategoryController::class,'show']);
});


//infos
Route::prefix('infos')->group(function () {
    Route::get('/' , [ApiInfoController::class,'index']);
    Route::get('/show' , [ApiInfoController::class,'show']);
});

// //contactus
Route::post('contactus/store' , [ApiContactUsController::class,'store'])->middleware(SanitizeInput::class);

//order
Route::post('order/store' , [ApiOrderController::class,'store'])->middleware(SanitizeInput::class);


//aboutus
Route::get('/content/aboutus' , [ApiContentController::class,'aboutus']);

//home
Route::get('/content/home' , [ApiContentController::class,'home']);

Route::get('/meta_data',[MetaDataController::class,'index']);
