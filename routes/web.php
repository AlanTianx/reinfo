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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin' , 'namespace' => 'admin'],function(){
    Route::group(['middleware'=>'admin_auth'],function(){
        Route::get('index','IndexController@index');
        Route::get('info','IndexController@info');
        Route::get('logout','IndexController@logout');
        Route::any('upd_pass','IndexController@upd_pass');
    });
    Route::any('login','LoginController@index')->name('a_login');
    Route::get('vf_code' , 'LoginController@vf_code');
});