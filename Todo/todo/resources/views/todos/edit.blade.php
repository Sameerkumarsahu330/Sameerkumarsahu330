@extends('layouts.app')
@section('title', 'Edit Task')


@section('content')
    <h2>Edit Todo</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('todo.update', $todo) }}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="task" class="form-label">Task</label>
            <input type="text" class="form-control" id="task" name="task" value="{{ old('task', $todo->task) }}" required>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="completed" name="completed" value="1" {{ $todo->completed ? 'checked' : '' }}>
            <label class="form-check-label" for="completed">Completed</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Todo</button>
    </form>
@endsection
