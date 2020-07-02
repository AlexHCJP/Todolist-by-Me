<?php

namespace App\Http\Controllers;

use App\ListTodo;
use Illuminate\Http\Request;

class ListTodoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->authorize('create', ListTodo::class);
        $data = $this->validate($request, array(
            'title' => 'required|max:255'
        ));
        $listsTodo = auth()->user()->listTodo();
        $listTodo = $listsTodo->create($data);
        return redirect()->route('listTodo.show', compact('listTodo'));
    }

    public function show(ListTodo $listTodo)
    {
        $this->authorize('view', $listTodo);
        $listTodo->todosByStatus();
        return view('list_todo/show', compact('listTodo'));
    }

    public function edit(ListTodo $listTodo)
    {
        //
    }

    public function update(Request $request, ListTodo $listTodo)
    {
        //
    }
    public function destroy(ListTodo $listTodo)
    {
        $this->authorize('delete', $listTodo);
        $listTodo->delete();
        return redirect()->route('home');
    }
}
