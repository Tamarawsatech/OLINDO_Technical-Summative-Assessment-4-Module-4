<?php

namespace App\Http\Controllers;

use App\Mail\TaskCompleted;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::where('is_archived', false)->orderBy('task_date')->orderBy('id')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->taskRules());
        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task): View
    {
        abort_if($task->is_archived, 404);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        abort_if($task->is_archived, 404);

        $validated = $request->validate($this->taskRules());
        $wasDone = $task->status === 'done';
        $task->update($validated);

        if (! $wasDone && $task->status === 'done') {
            Mail::to(config('mail.task_recipient'))->send(new TaskCompleted($task));
        }

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task): RedirectResponse
    {
        abort_if($task->is_archived, 404);
        $task->update(['is_archived' => true]);

        return redirect()->route('tasks.index')->with('success', 'Task archived successfully.');
    }

    private function taskRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:pending,in_progress,done,completed'],
            'task_date' => ['required', 'date'],
        ];
    }
}
