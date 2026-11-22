<x-mail::message>
# Task Completed

The following task has been marked as done:

**{{ $task->title }}**

Task date: {{ $task->task_date->format('F j, Y') }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
