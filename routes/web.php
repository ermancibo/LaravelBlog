<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


use App\Setting;

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware'=>['is_admin','auth']],function(){
    Route::group(['namespace'=>'Admin'],function(){
        Route::get('/site-settings','SettingController@index') ;
        Route::put('/site-settings/update','SettingController@update') ;
        Route::resource('user','UserController');
        Route::resource('categories','CategoryController');
        Route::resource("article","ArticleController");
        Route::post("/article/chance-status","ArticleController@changeStatus");
        Route::get("/requests","RequestController@index");
        Route::post("/requests/change-status","RequestController@changeStatus");
        Route::get("/requests/{id}","RequestController@index");
        Route::delete("/requests/{id}","RequestController@destroy")->name("request.destroy");

    });
});

Route::group(['middleware'=>['is_author','auth']],function(){
    Route::group(['namespace'=>'Author'],function(){

        Route::resource("articles","ArticleController");

    });
});

Route::get('/author-request','AuthorRequestController@index');

Route::post('/author-request/send','AuthorRequestController@sendRequest');

Route::get('/posts/{slug}','ArticleController@index');
Route::get('/category/{slug}','CategoryController@index');