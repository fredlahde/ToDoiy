<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Todo;

/**
 * Class TodoController
 * @package App\Http\Controllers
 */
class TodoController extends Controller
{
    /**
     * @return string
     */
    public function getTodos()
    {
        $todos = Todo::all();

        return json_encode($todos);
    }

    /**
     * @param Request $request
     */
    public function createTodo(Request $request)
    {
        $this->validate(
            $request,
            ['body' => 'required|max:60']
        );

        Todo::create([
            'body' => $request->input('body')
        ]);
    }

    /**
     * @param Request $request
     */
    public function deleteTodo(Request $request)
    {
        Todo::findOrFail($request->input('id'))->delete();
    }

    /**
     * @param Request $request
     */
    public function completeTodo(Request $request)
    {
        $todo = Todo::findOrFail($request->input('id'));

        $todo->completed = $request->input('completed');

        $todo->save();
    }

    /**
     * @param Request $request
     */
    public function deleteCompletedTodos(Request $request)
    {
        foreach ($request->input() as $item) {
            Todo::findOrFail($item['id'])->delete();
        }
    }
}
