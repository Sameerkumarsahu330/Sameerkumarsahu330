<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
{
    $todos = Todo::where('user_id', auth()->id())->get();

    if ($todos->isEmpty()) {
        // Handle case where there are no tasks available
        return view('todos.list')->with('todos', []);
    }

    return view('todos.list')->with('todos', $todos);
}



    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'task' => 'required|string|max:255',
    ]);

    $todo = new Todo();
    $todo->task = $request->task;
    $todo->completed = false;
    $todo->user_id = auth()->user()->id; // Assign the user ID

    $todo->save();

    return redirect()->route('todo.index')->with('success', 'Todo created successfully.');
}


    public function edit(Todo $todo)
    {
        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(Request $request, Todo $todo)
    {
        $validatedData = $request->validate([
            'task' => 'required|max:255',
            'completed' => 'boolean',
        ]);

        $todo->update([
            'task' => $validatedData['task'],
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('todo.index')->with('success', 'Todo updated successfully.');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todo.index')->with('success', 'Todo deleted successfully.');
    }
    public function show(Todo $todo) {
        return view('todos.show', ['todo' => $todo]);
    }

}
