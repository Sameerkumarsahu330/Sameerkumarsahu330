@extends('layouts.app')
@section('title', 'Task')

@section('content')
    <div class="container">
        <h2>Todo Details</h2>

        <div class="mb-3">
            <label for="task" class="form-label">Task</label>
            <input type="text" class="form-control" id="task" name="task" value="{{ $todo->task }}" readonly>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="completed" name="completed" {{ $todo->completed ? 'checked' : '' }} disabled>
            <label class="form-check-label" for="completed">Completed</label>
        </div>

        <a href="{{ route('todo.edit', $todo) }}" class="btn btn-primary">Edit</a>
    </div>
@endsection
