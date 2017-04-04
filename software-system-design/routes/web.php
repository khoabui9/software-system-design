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
Route::get('/project/{id}', 'ProjectsController@showOne');
Route::get('/project/delete/{id}', 'ProjectsController@delete');
Route::post('/project/create', 'ProjectsController@create');
Route::post('/project/update/{id}', 'ProjectsController@update');
Route::get('/sort', 'ProjectsController@sort');


Route::get('/tasks', 'TasksController@show');
Route::get('/task/delete/{id}', 'TasksController@delete');
Route::post('/task/create', 'TasksController@create');
Route::post('/task/update/{id}', 'TasksController@update');

Route::get('/users', 'UsersController@show');
Route::get('/user/delete/{email}', 'UsersController@delete');
Route::post('/user/create', 'UsersController@create');
Route::post('/user/update/{email}', 'UsersController@update');

// Route::get('/', 'TasksController@showTasks');
// Route::get('/ProjectsList', function () {
//     return redirect()->action('ProjectsController@showProjects');
// });
// Route::resource
