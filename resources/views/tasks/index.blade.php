@extends('layouts.app')

@section('title', 'Task List | Tasks for Today')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-2 mb-4">
        <div>
            <p class="text-primary fw-semibold mb-1">Complete overview</p>
            <h1 class="display-6 fw-bold mb-0">Task List</h1>
        </div>
        @auth
            <a class="btn btn-primary" href="{{ route('tasks.create') }}">Add task</a>
        @endauth
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive bg-white rounded shadow-sm">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Task Date</th>
                    @auth<th>Actions</th>@endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $task->status)) }}</td>
                        <td>{{ $task->task_date->format('F j, Y') }}</td>
                        @auth
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('tasks.edit', $task) }}">Edit</a>
                                    <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Archive</button>
                                    </form>
                                </div>
                            </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
