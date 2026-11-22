<div class="mb-3">
    <label class="form-label" for="title">Title</label>
    <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $task->title ?? '') }}" required>
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label" for="status">Status</label>
    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
        @foreach (['pending' => 'Pending', 'in_progress' => 'In Progress', 'done' => 'Done', 'completed' => 'Completed'] as $value => $label)
            <option value="{{ $value }}" @selected(old('status', $task->status ?? 'pending') === $value)>{{ $label }}</option>
        @endforeach
    </select>
    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-4">
    <label class="form-label" for="task_date">Task date</label>
    <input class="form-control @error('task_date') is-invalid @enderror" id="task_date" name="task_date" type="date" value="{{ old('task_date', isset($task) ? $task->task_date->format('Y-m-d') : '') }}" required>
    @error('task_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="d-flex gap-2">
    <button class="btn btn-primary" type="submit">Save task</button>
    <a class="btn btn-outline-secondary" href="{{ route('tasks.index') }}">Cancel</a>
</div>
