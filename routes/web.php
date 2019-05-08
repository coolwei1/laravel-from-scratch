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

// bind something into service container
//app()->bind('example', function (){
//    return new \App\Example;
//});

// singleton, only allowed one instance
// laravel auto resolution for you!
//app()->singleton('example', function (){
//    return new \App\Example;
//});

//Route::get('/', function (\App\Services\Twitter $twitter) {
////Route::get('/', function (\App\Repositories\UserRepository $users) {
//
//    // will check in service container first then check is there any class path
////    dd(app('example'), app('example'));
////    dd(app('App\Example'));
////    dd($twitter);
////    dd($users);
//    return view('welcome');
//});

//Route::get('/', function () {
//    return view('welcome');
//});

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

//Route::resource('projects', 'ProjectController');
Route::resource('projects', 'ProjectController')->middleware('can:update,project'); // the 'project' follow the route model binding {project}

//Route::get('/projects', 'ProjectController@index');
//Route::get('/projects/create', 'ProjectController@create');
//Route::get('/projects/{project}', 'ProjectController@show');
//Route::post('/projects', 'ProjectController@store');
//Route::get('/projects/{project}/edit', 'ProjectController@edit');
//Route::patch('/projects/{project}', 'ProjectController@update');
//Route::delete('/projects/{project}', 'ProjectController@destroy');

Route::post('/projects/{project}/tasks', 'ProjectTaskController@store');
Route::patch('/tasks/{task}', 'ProjectTaskController@update');
Route::post('/completed-task/{task}', 'CompletedTaskController@store');
Route::delete('/completed-task/{task}', 'CompletedTaskController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
