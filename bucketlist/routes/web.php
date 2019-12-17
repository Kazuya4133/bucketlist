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

Route::group(['middleware' => 'auth'], function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/user/{user_id}/tasks', 'TaskController@index')->name('tasks.index');

    Route::get('/user/{user_id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
    Route::post('/user/{user_id}/tasks/create', 'TaskController@create');
    
    Route::get('/user/{user_id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
    Route::post('/user/{user_id}/tasks/{task_id}/edit', 'TaskController@edit');
    
    Route::get('/user/{user_id}/tasks/{task_id}/delete', 'TaskController@showDeleteForm')->name('tasks.delete');
    Route::post('/user/{user_id}/tasks/{task_id}/delete', 'TaskController@remove');
    
    Route::get('/user/{user_id}/edit', 'UserController@showProfEditForm')->name('users.profEdit');
    Route::post('/user/{user_id}/edit', 'UserController@edit');
    
});

Auth::routes();