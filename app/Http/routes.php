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

Route::get('/api/todos', function () {
    $todos = App\Todo::all();

    return json_encode($todos);
});

Route::post('api/todos', function (Request $request) {
    App\Todo::create([
        'body' => $request->input('body')
    ]);
});

Route::post('/api/todo/delete/', function (Request $request) {
    App\Todo::findOrFail($request->input('id'))->delete();
});

Route::post('api/todo/complete', function (Request $request) {
    $todo = App\Todo::findOrFail($request->input('id'));

    $todo->completed = $request->input('completed');

    $todo->save();
});
