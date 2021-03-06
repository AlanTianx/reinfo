<?php

/*
|--------------------------------------------------------------------------
| web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'web_config'],function(){
    Route::get('/' , function () {
        return view('welcome');
    });
    Auth::routes();
    Route::namespace('web')->group(function (){
        /**
         * 记事本路由
         * */
        Route::resource('notepad','NotepadController');
        Route::get('ajaxgetnotepad/{status?}','NotepadController@ajaxgetnotepad');
        /**
         * 搜索路由
         * */
        Route::get('so','SearchController@index');
        Route::get('search','SearchController@search');
        Route::post('ajaxsearch','SearchController@Ajaxsearch');
        /**
         * 内容详情路由
         * */
        Route::get('info/{id}','SearchController@info')->where(['id' => '[0-9]+']);
        /**
         * 推荐路由
         * */
        Route::get('ajaxgetpush','SearchController@ajaxgetpush');
        /**
         * 录入信息路由
         * */
        Route::get('comppush','CompushController@index');
        Route::post('comppush','CompushController@comppush');
        /**
         * 报名路由
         * */
        Route::get('joinus','JoinController@index');
        Route::post('joinus','JoinController@add');
        Route::get('vf_code','JoinController@vf_code');
    });
    /**
     * 家目录路由
     * */
    Route::get('/home' , 'HomeController@index')->name('home');
});

Route::get('/error',function (){
    return view('error');
});
Route::get('/test','TestController@index');

/**
 * 下载路由
 * */
Route::any('upload' , 'UploadController@upload');
/* *
 *  后台路由
 * */
Route::group(['prefix' => 'admin' , 'namespace' => 'admin'],function(){
    Route::group(['middleware'=>'admin_auth'],function(){
        Route::group(['middleware'=>'super_auth'],function (){
            Route::get('joinus','JoinController@index');
            Route::post('ajaxjoinus','JoinController@del');
            Route::get('config','WebController@index');
            Route::post('config','WebController@insert');
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