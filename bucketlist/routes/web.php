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

Route::get('/{user_id}/tasks', 'TaskController@index')->name('tasks.index');
Route::get('/{user_id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
Route::post('/{user_id}/tasks/create', 'TaskController@create');