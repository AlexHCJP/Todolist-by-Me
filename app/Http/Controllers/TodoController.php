<?php

namespace App\Http\Controllers;

use App\ListTodo;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {

    }

    public function create(ListTodo $listTodo)
    {
        $this->authorize('create', Todo::class);
        return view('todo.create', compact('listTodo'));
    }

    public function store(Request $request, ListTodo $listTodo)
    {
        $this->authorize('create', Todo::class);
        $data = $this->validate($request, [
            'title' => 'required|max:255',
            'status' => 'required',
        ]);
        $listTodo->todo()->create($data);
        return redirect()->route('listTodo.show', $listTodo);

    }

    public function show(Todo $todo)
    {
        //
    }

    public function edit(Todo $todo)
    {
        $this->authorize('update', $todo);
        return view('todo.create', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $this->authorize('update', $todo);
        $data = $this->validate($request, [
            'title' => 'required|max:255',
            'status' => 'required'
        ]);
        $todo->update($data);
        return redirect()->route('listTodo.show', ['listTodo' => $todo->listTodo()->getResults()]);
    }
    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);
        $todo->delete();
        return redirect()->route('listTodo.show', ['listTodo' => $todo->listTodo()->getResults()]);
    }

    public function updateStatus(Todo $todo, int $status)
    {
        $this->authorize('update', $todo);
        if($status <= 3 && $status >= 1)
        {
            $todo->status = $status;
            $todo->save();
        }
    }
}
