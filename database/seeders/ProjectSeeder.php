<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Project 1',
                'tasks' => [
                    ['title' => 'Task 1', 'description' => 'Description 1', 'status' => 'new', 'due_date' => now()],
                    ['title' => 'Task 2', 'description' => 'Description 2', 'status' => 'completed', 'due_date' => now()->addDays(1)],
                ]
            ],
            [
                'name' => 'Project 2',
                'tasks' => [
                    ['title' => 'Task 3', 'description' => 'Description 3', 'status' => 'new', 'due_date' => now()],
                    ['title' => 'Task 4', 'description' => 'Description 4', 'status' => 'completed', 'due_date' => now()->addDays(1)],
                ]
            ],
        ];

        foreach ($projects as $projectData) {
            $project = Project::create([
                'name' => $projectData['name'],
            ]);

            foreach ($projectData['tasks'] as $taskData) {
                $project->tasks()->create($taskData);
            }
        }
    }
}
