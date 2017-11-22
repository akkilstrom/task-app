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

// EMPLOYEE ROUTES TA BORT
// Route::get('/employees', 'EmployeesController@index');
// Route::get('/employees/create', 'EmployeesController@create');
// Route::post('/employees', 'EmployeesController@store');
// Route::get('/employees/{employee}', 'EmployeesController@show');

// PROJECT ROUTES
Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/create', 'ProjectsController@create');
Route::post('/projects', 'ProjectsController@store');
Route::get('/projects/{project}', 'ProjectsController@show');

// CLIENT ROUTES
Route::get('/clients', 'ClientsController@index');
Route::get('/clients/create', 'ClientsController@create');
Route::post('/clients', 'ClientsController@store');

// TASK ROUTES          SKALL ÄNDRAS TILL TASKS ISTÄLLET?????
// Route::get('/cards', 'CardsController@index');
// Route::get('/cards/create', 'CardsController@create');
// Route::post('/cards', 'CardsController@store');
// Route::get('/cards/{card}', 'CardsController@show');

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/create', 'TasksController@create');
Route::post('/tasks', 'TasksController@store');
Route::get('/tasks/{task}', 'TasksController@show');

// Route::get('/cards/tags/{tag}', 'TagsController@index');
// Route::post('/cards/{card}/comments', 'CommentsController@store');

Route::get('/tasks/tags/{tag}', 'TagsController@index');
Route::post('/tasks/{task}/comments', 'CommentsController@store');

// AUTH ROUTES
Auth::routes();

// Middleware to make sure that you have to login to visit certain pages
//Route::group(['middleware' => 'auth'], function() {
//});