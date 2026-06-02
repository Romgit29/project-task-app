<?php

namespace App\Services;

use App\Enums\TaskStatus;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProjectService
{
    public function list(Request $request): Collection
    {
        $projects = Project::withCount([
            'tasks',
            'tasks as completed_tasks_count' => function ($query) {
                $query->where('status', TaskStatus::Completed->value);
            }
        ])->get();

        return $projects;
    }
}
