<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderformController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Account\IndexController as AccountIndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\SitesController as AdminSitesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
})->name('hello');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::get('/orderform', [OrderformController::class, 'index'])->name('orderform');
Route::post('/orderform', [OrderformController::class, 'store'])->name('orderform.store');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/category{id}', [NewsController::class, 'category'])->where('id', '\d+')->name('news.category');
Route::get('/news/category{idCategory}/news{id}', [NewsController::class, 'show'])->where(['idCategory' => '\d+', 'id' => '\d+'])->name('news.show');

Route::group(['middleware' => 'auth'], function(){

    Route::group(['prefix' => 'account', 'as' => 'account.'], function(){
        Route::get('/', AccountIndexController::class)->name('index');
        Route::get('logout', function(){
            Auth::logout();
            return redirect()->route('login');
        })->name('logout');
    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin.check'], function() {
        Route::get('/', AdminIndexController::class)->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class); 
        Route::resource('sites', AdminSitesController::class); 
        Route::get('parser', ParserController::class)->name('parser');
    });

});

Auth::routes();

// social routes
Route::group(['middleware' => 'guest'], function(){
    Route::get('/auth/{network}/redirect', [SocialController::class, 'index'])->where('network', '\w+')->name('auth.redirect');
    Route::get('/auth/{network}/callback', [SocialController::class, 'callback'])->where('network', '\w+')->name('auth.callback');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');