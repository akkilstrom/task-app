<?php

use Illuminate\Http\Request;
Use App\Project;
Use App\Client;
Use App\Task;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('projects', function (Project $project) {
    return Project::all();
});

Route::get('projects/{project}', function (Project $project) {
    return $project;
});

Route::get('clients', function (Client $client) {
    return Client::all();
});

Route::get('tasks', function (Task $task) {
    return Task::all();
});

Route::put('/tasks/{id}', 'TasksController@update');


