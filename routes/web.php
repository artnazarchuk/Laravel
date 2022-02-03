<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CommitController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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
    return view('welcome');
});


//admin routes

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::view('/', 'admin.index', ['someVeriable' => 'someText'])
        ->name('index');
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/categories', AdminCategoryController::class);
});

//news.store
//news routes

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])  // тут нужно разобраться с {id} всё ломается во вьюхе 
    ->where('news', '\d+')                                   // resources/views/news и не прходит тест
    ->name('news.show');

//category routes

Route::get('/news/categories', [CategoryController::class, 'index'])
    ->name('news.categories');

//welcome routes

Route::get('/news/welcome', [WelcomeController::class, 'index'])
    ->name('news.welcome');

    
Route::resource('/commit', CommitController::class);

Route::get('/collection', function() {
    $array = ['Anna', 'petiya', 'Vasia', 'kolya', 'Olya', 'Valia'];
    $collection = collect($array);
    dd($collection->map(function ($item) {
        return mb_strtoupper($item);
    })->sortKeys());
});

Route::resource('/content', ContentController::class);