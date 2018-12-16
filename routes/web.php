<?php

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
use Illuminate\Support\Facades\Route;


Route::get('/','PageController@welcome')->name('welcome');
// 單存的展示頁面
Route::get('/about','PageController@about')->name('about');
Route::get('/services', 'PageController@services')->name('services');


Route::group(['prefix' => 'v1'], function () {
    // 不需要再加路徑,他會幫你加好
  Route::resource('articles', ArticleApiController::class);
});

Route::resource('Posts','PostController');

// Route::get('/admin', 'HomeController@admin')->middleware('is_admin')
//     ->name('admin');
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/login', 'HomeController@login')->name('login');


Auth::routes();

Route::get('dashboard', 'DashBoardController@index')->name('dashboard');
Route::get('dashboard/list', 'DashBoardController@dashboard')->name('list');

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/private_doc', function(){
    return 'this is private doc for you';
});

Route::get('/service_doc', function(){
    return 'this is service doc for you';
});

Route::get('/js_fb_login', function() {
    return view('auth.fb_login');
});