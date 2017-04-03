<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index');
Route::get('/projects', 'ProjectsController@show');
Route::get('/tasks', 'TasksController@show');
Route::get('/task/delete/{id}', 'TasksController@delete');
Route::post('/updatetask/{id}', 'TasksController@update');
Route::post('/create', 'ProjectsController@create');
Route::post('/createtask', 'TasksController@create');
Route::get('/project/delete/{id}', 'ProjectsController@delete');
Route::get('/project/{id}', 'ProjectsController@showOne');
Route::get('/sort', 'ProjectsController@sort');

// Route::get('/', 'TasksController@showTasks');
// Route::get('/ProjectsList', function () {
//     return redirect()->action('ProjectsController@showProjects');
// });
// Route::resource
