<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


 //Route::get('/', function () {
    //return view('welcome');
 //});



// Route::get('edit', function () {
//     return view('page/edit');
// });

// Route::get('list', function () {
//     return view('page/list');
// });










 Route::get('register', function () {
 return view('register');
 });


 Route::get('login',['as'=>'login','uses'=>'LoginController@index']);
 Route::post('handleLogin',['as'=>'handleLogin','uses'=>'LoginController@handleLogin']);
 Route::get('home',['middleware'=>'auth','as'=>'home','uses'=>'PageController@home']);
 Route::get('logout',['as'=>'logout','uses'=>'LoginController@logout']);
 Route::resource('page','PageController',['only'=>['create','store']]);
 Route::post('page/insert','PageController@store');
 //Route::get('login','LoginController@store');
// Route::get('login', array('as' => 'login', function () { }));






Route::post('register','RegisterController@index');
Route::post('register/insert','RegisterController@store');
Route::get('register/list','RegisterController@index');
Route::get('register/edit/{id}','RegisterController@edit');
Route::get('register/create','RegisterController@create');
//Route::get('register/delete/{id}','RegisterController@delete');
Route::put('register/update/{id}',(array('as'=>'register.update','uses'=>'RegisterController@update')));
Route::delete('delete/{id}', array('uses' => 'RegisterController@delete'));

Route::get('register/verify/{token}', 'RegistrationController@confirmEmail');
Route::post('register', 'RegistrationController@postRegister');



//Route::get('register/verify', 'RegistrationController@verify');
//Route::post('register', 'RegistrationController@postRegister');



//Route::get('register/list','RegisterController@lists');









