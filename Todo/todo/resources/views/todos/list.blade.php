@extends('layouts.app')
@section('title', 'Todo List')

@section('content')
    <div class="container">
        <h1>{{auth()->user()-> name}}'s tasks</h1>
        <div class="mb-3">
            <a href="{{ route('todo.create') }}" class="btn btn-primary">Create New Todo</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Completed</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr>
                        <td>{{ $todo->task }}</td>
                        <td>{{ $todo->completed ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('todo.edit', $todo) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('todo.show', $todo) }}" class="btn btn-sm btn-secondary">View</a>
                            <form action="{{ route('todo.destroy', $todo) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this todo?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
