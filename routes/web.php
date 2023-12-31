<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EventController;
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


//products
Route::prefix('products')->group(function () {
    Route::get('/' , [ProductController::class,'index'])->name('Products.index');
    Route::get('/archive' , [ProductController::class,'archive'])->name('Products.archive');
    Route::get('/create' , [ProductController::class, 'create'])->name('Products.create');
    Route::post('/store' , [ProductController::class, 'store'])->name('Products.store');
    Route::get('/show/{id}' , [ProductController::class,'show'])->name('Products.show');
    Route::get('/edit/{id}' , [ProductController::class,'edit'])->name('Products.edit');
    Route::post('/update/{id}' , [ProductController::class,'update'])->name('Products.update');
    Route::get('/destroy/{id}' , [ProductController::class,'soft_delete'])->name('Products.soft_delete');
    Route::get('/restore/{id}' , [ProductController::class,'restore'])->name('Products.restore');
    Route::get('/delete/{id}' , [ProductController::class,'hard_delete'])->name('Products.hard_delete');
    Route::get('/search', [ProductController::class, 'search'])->name('Products.search');
    Route::get('/archive_search', [ProductController::class, 'archive_search'])->name('Products.archive_search');
    Route::get('/title_search', [ProductController::class, 'title_search'])->name('Products.title_search');
    Route::get('/archive_title_search', [ProductController::class, 'archive_title_search'])->name('Products.archive_title_search');
    Route::post('/searchByDate', [ProductController::class, 'searchByDate'])->name('Products.searchByDate');
});


//news
Route::prefix('events')->group(function () {
    Route::get('/' , [EventController::class,'index'])->name('Events.index');
    Route::get('/archive' , [EventController::class,'archive'])->name('Events.archive');
    Route::get('/create' , [EventController::class, 'create'])->name('Events.create');
    Route::post('/store' , [EventController::class, 'store'])->name('Events.store');
    Route::get('/show/{id}' , [EventController::class,'show'])->name('Events.show');
    Route::get('/edit/{id}' , [EventController::class,'edit'])->name('Events.edit');
    Route::post('/update/{id}' , [EventController::class,'update'])->name('Events.update');
    Route::get('/destroy/{id}' , [EventController::class,'soft_delete'])->name('Events.soft_delete');
    Route::get('/restore/{id}' , [EventController::class,'restore'])->name('Events.restore');
    Route::get('/delete/{id}' , [EventController::class,'hard_delete'])->name('Events.hard_delete');
    Route::get('/search', [EventController::class, 'search'])->name('Events.search');
    // Route::get('/archive_search', [EventController::class, 'archive_search'])->name('Events.archive_search');
    // Route::get('/title_search', [EventController::class, 'title_search'])->name('Events.title_search');
    // Route::get('/archive_title_search', [EventController::class, 'archive_title_search'])->name('Events.archive_title_search');
});

//info
Route::prefix('info')->group(function () {
    Route::get('/' , [InfoController::class,'index'])->name('info.index');
    Route::get('/archive' , [InfoController::class,'archive'])->name('info.archive');
    Route::get('create' , [InfoController::class, 'create'])->name('info.create');
    Route::post('/store' , [InfoController::class,'store'])->name('info.store');
    Route::get('/edit/{id}' , [InfoController::class,'edit'])->name('info.edit');
    Route::post('/update/{id}' , [InfoController::class,'update'])->name('info.update');
    Route::get('/soft_delete/{id}' , [InfoController::class,'soft_delete'])->name('info.soft_delete');
    Route::get('/restore/{id}' , [InfoController::class,'restore'])->name('info.restore');
    Route::get('/hard_delete/{id}' , [InfoController::class,'hardDelete'])->name('info.hard_delete');
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
    Route::get('/create' , [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store' , [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}' , [CategoryController::class,'edit'])->name('category.edit');
    Route::post('/update/{id}' , [CategoryController::class,'update'])->name('category.update');
    Route::get('/delete/{id}' , [CategoryController::class,'delete'])->name('category.delete');
    Route::get('/search' , [CategoryController::class,'search'])->name('category.search');
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
    Route::post('update_role', [UserController::class, 'update_role'])->name('update_role');
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


Route::prefix('content')->group(function () {
    Route::get('/content' , [ContentController::class,'content'])->name('content.show');
    Route::post('/update' , [ContentController::class,'update'])->name('content.update');
});