<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Carbon;

class PageController extends Controller
{
    public function home()
    {
        $today = Carbon::today();
        $tasks = Task::where('is_archived', false)
            ->whereDate('task_date', $today)
            ->orderBy('id')
            ->get();

        return view('home', compact('tasks', 'today'));
    }

    public function about()
    {
        return view('about');
    }
}
