<?php
use App\Enums\TaskStatus;
use App\Models\Project;
?>

<x-layout title="Список задач">
    <div class="main-header">
        Список задач
    </div>

    <div class="grid gap-5 max-w-md mx-auto">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Добавить задачу</a>
        <form method="GET" action="{{ url()->current() }}" class="app-row bg-white p-4 rounded-xl shadow-sm">
            <div class="grid grid-cols-2 gap-4 mb-2">
                <div>
                    <label for="project_id" class="form-field-label">Выбрать проект</label>
                    <select name="project_id" id="project_id" class="form-field bg-white">
                        <option value="" {{ !request('project_id') ? 'selected' : '' }} disabled hidden></option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>
                                {{ $project->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="status" class="form-field-label">Статус задач в проекте</label>
                    <select name="status" id="status" class="form-field bg-white">
                        <option value="" {{ !request('status') ? 'selected' : '' }} disabled hidden></option>
                        @foreach(TaskStatus::cases() as $status)
                            <option value="{{ $status->value }}" {{ request('status') === $status->value ? 'selected' : '' }}>
                                {{ $status->label() }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex mt-4">
                <button type="submit" class="btn btn-primary">Применить</button>
                <a href="{{ url()->current() }}" class="btn btn-secondary ml-2">Сбросить</a>
            </div>
        </form>

        @foreach ($tasks as $task)
            <div class="app-row">
                <div>
                    <div class="app-subrow">
                        <span class="project-label">Название:</span>
                        <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 hover:underline">
                            {{ $task->title }}
                        </a>
                    </div>

                    <div class="app-subrow">
                        <span class="project-label">Проект:</span>
                        <span>{{ $task->project->name }}</span>
                    </div>

                    <div class="app-subrow">
                        <span class="project-label">Статус:</span>
                        <span class="project-badge {{ $task->status === 'completed' ? 'bg-green-200' : 'bg-gray-200' }}">
                            {{ TaskStatus::from($task->status)->label() }}
                        </span>
                    </div>

                    <div class="app-subrow">
                        <span class="project-label">Дедлайн:</span>
                        <span>{{ $task->due_date?->format('d.m.Y') ?? 'Нет дедлайна' }}</span>
                    </div>

                    <div class="app-subrow">
                        <span class="project-label">Дата добавления:</span>
                        <span>{{ $task->created_at->format('d.m.Y H:i') }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
