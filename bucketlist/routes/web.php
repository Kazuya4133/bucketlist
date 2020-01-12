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

Route::group(['middleware' => 'auth'], function() {        
    Route::get('/', 'HomeController@index')->name('home');
    
    Route::get('/users/{user}/tasks', 'TaskController@index')->name('tasks.index');
    
    // Route::group(['middleware' => 'can:view, task'], function() {

        Route::get('/users/{user}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
        Route::post('/users/{user}/tasks/create', 'TaskController@create');

        Route::get('/users/{user}/tasks/{task}/edit', 'TaskController@showEditForm')->name('tasks.edit');
        Route::post('/users/{user}/tasks/{task}/edit', 'TaskController@edit');
            
        Route::get('/users/{user}/tasks/{task}/delete', 'TaskController@showDeleteForm')->name('tasks.delete');
        Route::post('/users/{user}/tasks/{task}/delete', 'TaskController@remove');
            
        Route::get('/users/{user}/edit', 'UserController@showProfEditForm')->name('users.edit');
        Route::post('/users/{user}/edit', 'UserController@edit');
    });
// });

Auth::routes();