@extends('layouts.app')

@section('title', 'Edit Task | Tasks for Today')

@section('content')
    <div class="mb-4">
        <p class="text-primary fw-semibold mb-1">Task management</p>
        <h1 class="display-6 fw-bold mb-0">Edit Task</h1>
    </div>

    <form method="POST" action="{{ route('tasks.update', $task) }}" class="card border-0 shadow-sm p-4">
        @csrf
        @method('PUT')
        @include('tasks.form')
    </form>
@endsection
