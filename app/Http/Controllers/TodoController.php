<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Todo;

class TodoController extends Controller
{
    public function getTodos()
    {
        $todos = Todo::all();

        return json_encode($todos);
    }

    public function createTodo(Request $request)
    {
        // TODO Validate
        $this->validate($request, [
           'body' => 'required|max:60'
        ]);

        Todo::create([
            'body' => $request->input('body')
        ]);
    }

    public function deleteTodo(Request $request)
    {
        Todo::findOrFail($request->input('id'))->delete();
    }

    public function completeTodo(Request $request)
    {
        $todo = Todo::findOrFail($request->input('id'));

        $todo->completed = $request->input('completed');

        $todo->save();
    }
}
