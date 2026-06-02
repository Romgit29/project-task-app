<x-layout title="Список проектов">
    <h1 class="main-header">Список проектов</h1>

    <div class="grid gap-5 max-w-sm mx-auto">
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Добавить проект</a>
        @foreach ($projects as $project)
            <div class="app-row">
                <div>
                    <div class="app-subrow">
                        <span class="project-label">Название:</span>
                        <span>{{ $project->name }}</span>
                    </div>

                    <div class="app-subrow">
                        <span class="project-label">Всего задач:</span>
                        <span class="project-badge bg-gray-200">{{ $project->tasks_count }}</span>
                    </div>

                    <div class="app-subrow">
                        <span class="project-label">Завершено:</span>
                        <span class="project-badge bg-green-200">{{ $project->completed_tasks_count }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>