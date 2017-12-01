<?php

/*
|-------------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

// HOME ROUTES
// Route::get('/', function () { return view('welcome'); });
Route::get('/', 'HomeController@index')->name('home');

// MODEL ROUTE
Route::get('/models', function () { return view('models.index'); });

// PROJECT ROUTES
Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/create', 'ProjectsController@create');
Route::post('/projects', 'ProjectsController@store');
Route::get('/projects/{project}', 'ProjectsController@show');
Route::get('/projects/{project}/edit', 'ProjectsController@edit');
Route::post('/projects', 'ProjectsController@update');

// CLIENT ROUTES
Route::get('/clients', 'ClientsController@index');
Route::get('/clients/create', 'ClientsController@create');
Route::post('/clients', 'ClientsController@store');

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/create', 'TasksController@create');
Route::post('/tasks', 'TasksController@store');
Route::get('/tasks/{task}', 'TasksController@show');

Route::get('/tasks/tags/{tag}', 'TagsController@index');
Route::post('/tasks/{task}/comments', 'CommentsController@store');

// AUTH ROUTES
Auth::routes();

// Middleware to make sure that you have to login to visit certain pages
//Route::group(['middleware' => 'auth'], function() {
//});