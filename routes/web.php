<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/category{id}', [NewsController::class, 'category'])->where('id', '\d+')->name('news.category');
Route::get('/news/category{idCategory}/news{id}', [NewsController::class, 'show'])->where(['idCategory' => '\d+', 'id' => '\d+'])->name('news.show');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class); 
});