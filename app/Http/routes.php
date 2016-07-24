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

//Route::get('/', ['as' => 'home','uses' =>'WelcomeController@dashboard']);

Route::get('/', ['as' => 'login', 'uses' => 'WelcomeController@login']);

Route::get('/dashboard', ['as' => 'home','uses' =>'WelcomeController@dashboard']);

Route::post('/login', ['as' => 'doLogin', 'uses' => 'WelcomeController@doLogin']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'WelcomeController@logout']);

Route::get('/safety-permit', ['as' => 'safety-permit.list', 'uses' => 'SafetyPermitController@index']);
Route::get('/accident-report', ['as' => 'accient-report.list', 'uses' => 'AccidentController@index']);
Route::get('/emergency-report', ['as' => 'emergency-report.list', 'uses' => 'EmergencyController@index']);

Route::get('/ajax/detail/{tipe}/{id}', ['as' => 'safety-permit.detail', 'uses' => 'AjaxController@detail']);
Route::get('/ajax/konfirmasi/{tipe}/{id}', ['as' => 'safety-permit.konfirmasi', 'uses' => 'AjaxController@konfirmasi']);