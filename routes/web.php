<?php
/*
|-------------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------------
| 
| Here is the web routes for the application. These routes are loaded by the 
| RouteServiceProvider within a group which contains the "web" middleware group.
*/

// HOME ROUTES
Route::get('/', 'HomeController@index')->name('home');

// MODEL ROUTE
Route::get('/models', function () { return view('models.index'); });

// PROJECT ROUTES
Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/create', 'ProjectsController@create');
Route::post('/projects', 'ProjectsController@store');
Route::get('/projects/{project}', 'ProjectsController@show');
Route::get('/projects/{project}/edit', 'ProjectsController@edit');
Route::post('/projects/{project}', 'ProjectsController@update');
Route::put('/projects/{id}', 'ProjectsController@update')->name('projects.update');
Route::delete('/projects/{project}/destroy', 'ProjectsController@destroy')->name('projects.destroy');

// CLIENT ROUTES
Route::get('/clients', 'ClientsController@index');
Route::get('/clients/create', 'ClientsController@create');
Route::post('/clients', 'ClientsController@store');
Route::get('/clients/{client}', 'ClientsController@show');

// TASK ROUTES
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/create', 'TasksController@create');
Route::post('/tasks', 'TasksController@store');
Route::get('/tasks/{task}', 'TasksController@show');
Route::post('/tasks/{task}', 'TasksController@update');
Route::put('/tasks/{id}', 'TasksController@update')->name('tasks.update');
Route::delete('/tasks/{task}/destroy', 'TasksController@destroy')->name('tasks.destroy');
Route::get('/tasks/tags/{tag}', 'TagsController@index');
Route::post('/tasks/{task}/comments', 'CommentsController@store');

// AUTH ROUTES
Auth::routes();
