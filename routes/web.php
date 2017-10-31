<?php

/*
|-------------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () { return view('welcome'); });

Route::get('/employees', 'EmployeesController@index');
Route::get('/employees/create', 'EmployeesController@create');
Route::post('/employees', 'EmployeesController@store');
Route::get('/employees/{employee}', 'EmployeesController@show');

Route::get('/cards', 'CardsController@index');
Route::get('/cards/create', 'CardsController@create');
Route::post('/cards', 'CardsController@store');
Route::get('/cards/{card}', 'CardsController@show');

Route::post('/cards/{card}/comments', 'CommentsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
