<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $today = Carbon::today();

        $tasks = [
            ['title' => 'Review today\'s sales summary', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Reply to customer inquiries', 'status' => 'in_progress', 'task_date' => $today],
            ['title' => 'Prepare the afternoon report', 'status' => 'completed', 'task_date' => $today],
            ['title' => 'Organize product records', 'status' => 'pending', 'task_date' => $today->copy()->addDay()],
            ['title' => 'Check inventory notes', 'status' => 'in_progress', 'task_date' => $today->copy()->addDay()],
            ['title' => 'Plan next week\'s schedule', 'status' => 'pending', 'task_date' => $today->copy()->addDays(2)],
            ['title' => 'Review supplier follow-ups', 'status' => 'completed', 'task_date' => $today->copy()->subDay()],
            ['title' => 'Archive completed paperwork', 'status' => 'pending', 'task_date' => $today->copy()->subDays(2)],
        ];

        foreach ($tasks as $task) {
            Task::updateOrCreate(
                ['title' => $task['title'], 'task_date' => $task['task_date']],
                ['status' => $task['status']]
            );
        }

        User::updateOrCreate(
            ['username' => 'kcolindo'],
            ['full_name' => 'Karl Michael C. Olindo', 'email' => 'kcolindo@pos.test']
        );
    }
}
