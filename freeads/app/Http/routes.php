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
Route::get('/', 'IndexController@home');

Route::post('home', 'AuthController@auth');
Route::get('home', 'AuthController@auth');

Route::get('logout', 'UserController@logout');

Route::get('signin', 'UserController@signin');
Route::post('signin', 'UserController@store');

Route::get('account', 'UserController@account');

Route::post('account/edit', 'UserController@edit');

Route::get('activation', 'UserController@activation');

Route::get('ads/new', 'AdController@newAds');
Route::post('ads/new', 'AdController@add');

Route::get('ads/list', 'AdController@adList');
Route::get('ads/list/{sort}', 'AdController@adList');

Route::get('ads/edit', 'AdController@myads');

Route::get('ads/edit/{id}', 'AdController@edit');
Route::post('ads/edit/{id}', 'AdController@modify');

Route::get('ads/delete/{id}', 'AdController@delete');

Route::get('ads/show/{id}', 'AdController@show');

Route::get('ads/search', 'AdController@search');
Route::post('ads/search', 'AdController@doSearch');

Route::get('mail', 'MessageController@inbox');

Route::get('mail/send/{id}', 'MessageController@send');
Route::post('mail/send/{id}', 'MessageController@doSend');

Route::get('mail/read/{id}', 'MessageController@read');