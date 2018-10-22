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

Route::get('/', 'TasksController@index');

Route::resource('tasks', 'TasksController');

// status毎の一覧ページ
Route::get('tasks', 'TasksController@status_working')->name('tasks.status_working');
