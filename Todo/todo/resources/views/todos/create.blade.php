@extends('layouts.app')
@section('title', 'Create Task')


@section('content')
    <h2>Create New Todo</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('todo.store') }}">
        @csrf

        <div class="mb-3">
            <label for="task" class="form-label">Task</label>
            <input type="text" class="form-control" id="task" name="task" value="{{ old('task') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Todo</button>
    </form>
@endsection
