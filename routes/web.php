<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MetaDataPagesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/error', function () {
    return view('errors.404');
})->name('error_page');


//News
Route::prefix('news')->group(function () {
    Route::get('/' , [NewsController::class,'index'])->name('News.index');
    Route::get('/archive' , [NewsController::class,'archive'])->name('News.archive');
    Route::get('/create' , [NewsController::class, 'create'])->name('News.create');
    Route::post('/store' , [NewsController::class, 'store'])->name('News.store');
    Route::get('/show/{id}' , [NewsController::class,'show'])->name('News.show');
    Route::get('/edit/{id}' , [NewsController::class,'edit'])->name('News.edit');
    Route::post('/update/{id}' , [NewsController::class,'update'])->name('News.update');
    Route::get('/destroy/{id}' , [NewsController::class,'soft_delete'])->name('News.soft_delete');
    Route::get('/restore/{id}' , [NewsController::class,'restore'])->name('News.restore');
    Route::get('/delete/{id}' , [NewsController::class,'hard_delete'])->name('News.hard_delete');
    Route::get('/search', [NewsController::class, 'search'])->name('News.search');
    Route::get('/archive_search', [NewsController::class, 'archive_search'])->name('News.archive_search');
    Route::get('/title_search', [NewsController::class, 'title_search'])->name('News.title_search');
    Route::get('/archive_title_search', [NewsController::class, 'archive_title_search'])->name('News.archive_title_search');
    Route::post('/searchByDate', [NewsController::class, 'searchByDate'])->name('News.searchByDate');
});


//Articles
Route::prefix('article')->group(function () {
    Route::get('/' , [ArticleController::class,'index'])->name('Articles.index');
    Route::get('/archive' , [ArticleController::class,'archive'])->name('Articles.archive');
    Route::get('/create' , [ArticleController::class, 'create'])->name('Articles.create');
    Route::post('/store' , [ArticleController::class, 'store'])->name('Articles.store');
    Route::get('/show/{id}' , [ArticleController::class,'show'])->name('Articles.show');
    Route::get('/edit/{id}' , [ArticleController::class,'edit'])->name('Articles.edit');
    Route::post('/update/{id}' , [ArticleController::class,'update'])->name('Articles.update');
    Route::get('/destroy/{id}' , [ArticleController::class,'soft_delete'])->name('Articles.soft_delete');
    Route::get('/restore/{id}' , [ArticleController::class,'restore'])->name('Articles.restore');
    Route::get('/delete/{id}' , [ArticleController::class,'hard_delete'])->name('Articles.hard_delete');
    Route::get('/search', [ArticleController::class, 'search'])->name('Articles.search');
    Route::get('/archive_search', [ArticleController::class, 'archive_search'])->name('Articles.archive_search');
    Route::get('/title_search', [ArticleController::class, 'title_search'])->name('Articles.title_search');
    Route::get('/archive_title_search', [ArticleController::class, 'archive_title_search'])->name('Articles.archive_title_search');
});

//info
Route::prefix('info')->group(function () {
    Route::get('/' , [InfoController::class,'index'])->name('info.index');
    Route::get('/archive' , [InfoController::class,'archive'])->name('info.archive');
    Route::get('create' , [InfoController::class, 'create'])->name('info.create');
    Route::post('/store' , [InfoController::class,'store'])->name('info.store');
    Route::get('/edit/{id}' , [InfoController::class,'edit'])->name('info.edit');
    Route::put('/update/{id}' , [InfoController::class,'update'])->name('info.update');
    Route::get('/soft_delete/{id}' , [InfoController::class,'soft_delete'])->name('info.soft_delete');
    Route::get('/restore/{id}' , [InfoController::class,'restore'])->name('info.restore');
    Route::get('/hard_delete/{id}' , [InfoController::class,'restore'])->name('info.hard_delete');
    Route::get('/search' , [InfoController::class,'search'])->name('info.search');
    Route::get('/archive_search' , [InfoController::class,'archive_search'])->name('info.archive_search');
});

//contactus
Route::prefix('contactus')->group(function () {
    Route::get('/' , [ContactUsController::class,'index'])->name('contactus.index');
    Route::get('/archive' , [ContactUsController::class,'archive'])->name('contactus.archive');
    Route::get('/show/{id}' , [ContactUsController::class,'show'])->name('contactus.show');
    Route::get('/destroy/{id}' , [ContactUsController::class,'soft_delete'])->name('contactus.soft_delete');
    Route::get('/restore/{id}' , [ContactUsController::class,'restore'])->name('contactus.restore');
    Route::get('/delete/{id}' , [ContactUsController::class,'hard_delete'])->name('contactus.hard_delete');
    Route::get('/search' , [ContactUsController::class,'search'])->name('contactus.search');
    Route::get('/archive_search' , [ContactUsController::class,'archive_search'])->name('contactus.archive_search'); 
});

//orders
Route::prefix('orders')->group(function () {
    Route::get('/' , [OrderController::class,'index'])->name('orders.index');
    Route::get('/archive' , [OrderController::class,'archive'])->name('orders.archive');
    Route::get('/show/{id}' , [OrderController::class,'show'])->name('orders.show');
    Route::get('/destroy/{id}' , [OrderController::class,'soft_delete'])->name('orders.soft_delete');
    Route::get('/restore/{id}' , [OrderController::class,'restore'])->name('orders.restore');
    Route::get('/delete/{id}' , [OrderController::class,'hard_delete'])->name('orders.hard_delete');
    // Route::get('/search' , [ContactUsController::class,'search'])->name('contactus.search');
    // Route::get('/archive_search' , [ContactUsController::class,'archive_search'])->name('contactus.archive_search'); 
});



//category
Route::prefix('category')->group(function () {
    Route::get('/' , [CategoryController::class,'index'])->name('category.index');
    Route::get('/archive' , [CategoryController::class,'archive'])->name('category.archive');
    Route::get('/create' , [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store' , [CategoryController::class, 'store'])->name('category.store');
    Route::get('/show/{id}' , [CategoryController::class,'show'])->name('category.show');
    Route::get('/edit/{id}' , [CategoryController::class,'edit'])->name('category.edit');
    Route::post('/update/{id}' , [CategoryController::class,'update'])->name('category.update');
    Route::get('/destroy/{id}' , [CategoryController::class,'soft_delete'])->name('category.soft_delete');
    Route::get('/restore/{id}' , [CategoryController::class,'restore'])->name('category.restore');
    Route::get('/delete/{id}' , [CategoryController::class,'hard_delete'])->name('category.hard_delete');
    Route::get('/search' , [CategoryController::class,'search'])->name('category.search');
    Route::get('/archive_search' , [CategoryController::class,'archive_search'])->name('category.archive_search');
});




//Jobs
Route::prefix('job')->group(function () {
    Route::get('/' , [JobController::class,'index'])->name('Jobs.index');
    Route::get('/archive' , [JobController::class,'archive'])->name('Jobs.archive');
    Route::get('/create' , [JobController::class, 'create'])->name('Jobs.create');
    Route::post('/store' , [JobController::class, 'store'])->name('Jobs.store');
    Route::get('/edit/{id}' , [JobController::class,'edit'])->name('Jobs.edit');
    Route::post('/update/{id}' , [JobController::class,'update'])->name('Jobs.update');
    Route::get('/destroy/{id}' , [JobController::class,'soft_delete'])->name('Jobs.soft_delete');
    Route::get('/restore/{id}' , [JobController::class,'restore'])->name('Jobs.restore');
    Route::get('/delete/{id}' , [JobController::class,'hard_delete'])->name('Jobs.hard_delete');
    Route::get('/search', [JobController::class, 'search'])->name('Jobs.search');
    Route::get('/archive_search', [JobController::class, 'archive_search'])->name('Jobs.archive_search');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::group(['middleware' => 'auth.admin'], function () {
    Route::get('register_form', [UserController::class, 'register_form'])->name('register_form');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('update_role/{id}', [UserController::class, 'update_role'])->name('update_role');
});

//meta data
Route::prefix('metadata')->group(function () {
    Route::get('/' , [MetaDataPagesController::class,'index'])->name('metadata.index');
    Route::get('/create' , [MetaDataPagesController::class, 'create'])->name('metadata.create');
    Route::post('/store' , [MetaDataPagesController::class, 'store'])->name('metadata.store');
    Route::get('/edit/{id}' , [MetaDataPagesController::class,'edit'])->name('metadata.edit');
    Route::post('/update/{id}' , [MetaDataPagesController::class,'update'])->name('metadata.update');
    Route::get('/delete/{id}' , [MetaDataPagesController::class,'delete'])->name('metadata.delete');
});

Route::prefix('contentw')->group(function () {
    //values of home page
    Route::get('/home/{value1}' , [ContentController::class,'value'])->name('value1.show');
    Route::get('/home/{value2}' , [ContentController::class,'value'])->name('value2.show');
    Route::get('/home/{value3}' , [ContentController::class,'value'])->name('value3.show');
});
Route::prefix('contenta')->group(function () {
    Route::get('/{ourcompanies}/header' , [ContentController::class,'header'])->name('ourcompaniesheader.show');
    Route::get('/aboutus/ceo' , [ContentController::class,'ceo'])->name('ceo.show');
    Route::get('/aboutus/mission' , [ContentController::class,'mission'])->name('mission.show');
    Route::get('/aboutus/vision' , [ContentController::class,'vision'])->name('vision.show');
    Route::get('/ourcompanies/{activity}' , [ContentController::class,'ourcompanies'])->name('activity.show');
    Route::get('/ourcompanies/{experience}' , [ContentController::class,'ourcompanies'])->name('experience.show');
    Route::get('/home/{activity}' , [ContentController::class,'homeactivity'])->name('homeactivity.show');
    
});

Route::prefix('contents')->group(function () {
    //header of pages 
    Route::get('/{home}/header' , [ContentController::class,'header'])->name('homeheader.show');
    Route::get('/{aboutus}/header' , [ContentController::class,'header'])->name('aboutusheader.show');
    Route::get('/{careers}/header' , [ContentController::class,'header'])->name('careersheader.show');
    Route::post('/{page_name}/header/update' , [ContentController::class,'headerupdate'])->name('pageheader.update');
    //reasons of careers page
    Route::get('/careers/{reason1}' , [ContentController::class,'reason'])->name('careersreason1.show');
    Route::get('/careers/{reason2}' , [ContentController::class,'reason'])->name('careersreason2.show');
    Route::get('/careers/{reason3}' , [ContentController::class,'reason'])->name('careersreason3.show');
    //characteristics of aboutus page
    Route::get('/aboutus/{characteristic1}' , [ContentController::class,'characteristic'])->name('aboutuscharacteristic1.show');
    Route::get('/aboutus/{characteristic2}' , [ContentController::class,'characteristic'])->name('aboutuscharacteristic2.show');
    Route::get('/aboutus/{characteristic3}' , [ContentController::class,'characteristic'])->name('aboutuscharacteristic3.show');
    //be part of our team of careers page
    Route::get('/ourteam' , [ContentController::class,'ourteam'])->name('careersteam.show');
    
    //update
    Route::post('/{type}/update' , [ContentController::class,'update'])->name('content.update');
});