<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTodoRequest; //練習のためFormRequestも使用


class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::all();
        return view('index', ['todoList' => $todos]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $todo = $request->all();
        Todo::create($todo);
        return redirect('/');
    }
    
    //↓練習のためFormRequestも使用
    public function update(UpdateTodoRequest $request)
    {
        $t = $request->except('_token');
        Todo::where('id', $request->id)->update($t);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
