<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TaskService
{
    public function list(Request $request): Collection
    {
        $tasks = Task::with('project')
            ->when($request->filled('status'), fn($query) => $query->where('status', $request->status))
            ->when($request->filled('project_id'), fn($query) => $query->where('project_id', $request->project_id))
            ->get();

        return $tasks;
    }
}
