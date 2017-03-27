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

Route::post('/create', 'ProjectsController@create');
Route::get('/project/delete/{id}', 'ProjectsController@delete');
Route::get('/project/{id}', 'ProjectsController@showOne');

// Route::get('/', 'TasksController@showTasks');
// Route::get('/ProjectsList', function () {
//     return redirect()->action('ProjectsController@showProjects');
// });
// Route::resource
