<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/todos', [
   'uses' => 'TodoController@getTodos'
]);

Route::post('/api/todos', [
    'uses' => 'TodoController@createTodo'
]);

Route::post('/api/todo/delete', [
    'uses' => 'TodoController@deleteTodo'
]);

Route::post('/api/todo/complete', [
    'uses' => 'TodoController@completeTodo'
]);
