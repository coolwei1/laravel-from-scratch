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

Route::get('/', function () {
    return view('welcome');
});

/*
 * GET /projects (index)
 * GET /projects/create (create)
 * GET /projects/1 (show)
 * POST /projects (store)
 * GET /projects/1/edit (edit)
 * PATCH /projects/1 (update)
 * DELETE /projects/1 (destroy)
 *
 * PATCH and PUT only slightly difference
 */

Route::resource('projects', 'ProjectController');
//Route::get('/projects', 'ProjectController@index');
//Route::get('/projects/create', 'ProjectController@create');
//Route::get('/projects/{project}', 'ProjectController@show');
//Route::post('/projects', 'ProjectController@store');
//Route::get('/projects/{project}/edit', 'ProjectController@edit');
//Route::patch('/projects/{project}', 'ProjectController@update');
//Route::delete('/projects/{project}', 'ProjectController@destroy');
