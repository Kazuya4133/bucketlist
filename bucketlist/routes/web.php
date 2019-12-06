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

// {user_id}では動かなかったのはなぜか？
Route::get('/user/{id}/tasks', 'TaskController@index')->name('tasks.index');
Route::get('/user/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
Route::post('/user/{id}/tasks/create', 'TaskController@create');