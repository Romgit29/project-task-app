<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;
use App\Http\Requests\TaskStoreRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = (new TaskService())->list($request);
        $projects = Project::get();

        return view('tasks.index', compact('tasks', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::get();

        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        $task = new Task();

        return $this->save($request, $task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $projects = Project::get();

        return view('tasks.edit', compact('task', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskStoreRequest $request, Task $task)
    {
        return $this->save($request, $task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $response = $this->tryCatchWrap(function () use ($task) {
            $task->delete();
        }, 
        'tasks');

        return $response;
    }

    private function save(TaskStoreRequest $request, Task $task)
    {
        $response = $this->tryCatchWrap(function () use ($request, $task) {
                $task->fill($request->validated());
                $task->save();
            },
            'tasks'
        );

        return $response;
    }
}
