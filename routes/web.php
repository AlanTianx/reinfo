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
Route::any('upload' , 'UploadController@upload');
Route::group(['prefix' => 'admin' , 'namespace' => 'admin'],function(){
    Route::group(['middleware'=>'admin_auth'],function(){
        Route::group(['middleware'=>'super_auth'],function (){
            Route::resource('menu','MenuController');
            Route::post('menu/ajaxorder','MenuController@ajaxorder');
            Route::resource('adminauth','AdminauthController');
            Route::match(['get','post'],'addadmin','IndexController@add_admin');
            Route::get('showadmin','IndexController@show_admin');
            Route::any('pushMenu/{id}','IndexController@pushMenu')->where(['id' => '[0-9]+']);
            Route::any('pushAuth/{id}','IndexController@pushAuth')->where(['id' => '[0-9]+']);
            Route::post('dltadmin/{id}','IndexController@dlt_admin')->where(['id' => '[0-9]+']);
            Route::resource('routeList','RouteListController');
            Route::resource('category','CategoryController');
            Route::get('ajaxChangeOrder/{id}/{order}','CategoryController@ajaxChangeOrder');
            Route::resource('company','CompanyController');
            Route::resource('filt','FiltController');
            Route::get('audit/{type}','AuditController@index')->where(['type' => '[1-3]+']);
            Route::post('auditPass','AuditController@auditPass');
        });
        Route::get('index','IndexController@index');
        Route::get('info','IndexController@info');
        Route::get('logout','IndexController@logout');
        Route::any('upd_pass','IndexController@upd_pass');
    });
    Route::any('login','LoginController@index')->name('a_login');
    Route::get('vf_code' , 'LoginController@vf_code');
});