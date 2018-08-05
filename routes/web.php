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

//Route::get('/', function () {
//    return view('index');
//});
Route::get('/','SiteController@index')->name('index');
//Task
Route::get('/tasks/create','TaskController@createTask')->name('tasks.create');
Route::post('/tasks/create','TaskController@createRequestTask');
Route::get('/tasks/edit/{id}','TaskController@editTask')->where('id','\d+')->name('tasks.edit');
Route::post('/tasks/edit/{id}','TaskController@editRequestTask')->where('id','\d+');
Route::delete('/tasks/delete','TaskController@deleteTask')->name('tasks.delete');
//Comment
Route::delete('/comments/delete','CommentController@deleteComment')->name('comments.delete');
