@extends('layouts.app')

@section('title', 'Welcome | Tasks for Today')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-2 mb-4">
        <div>
            <p class="text-primary fw-semibold mb-1">Daily dashboard</p>
            <h1 class="display-6 fw-bold mb-0">Welcome to Tasks for Today</h1>
        </div>
        <div class="text-md-end">
            <p class="text-secondary mb-2">Today: {{ $today->format('F j, Y') }}</p>
            @auth
                <a class="btn btn-primary btn-sm" href="{{ route('tasks.create') }}">Add task</a>
            @endauth
        </div>
    </div>

    @if ($tasks->isEmpty())
        <div class="alert alert-info">There are no tasks scheduled for today.</div>
    @else
        <div class="row g-4">
            @foreach ($tasks as $task)
                <div class="col-md-6 col-xl-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <span class="badge text-bg-secondary mb-3">{{ ucfirst(str_replace('_', ' ', $task->status)) }}</span>
                            <h2 class="h5">{{ $task->title }}</h2>
                            <p class="text-secondary small mb-0">Scheduled for {{ $task->task_date->format('F j, Y') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
