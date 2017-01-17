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
    });
});
