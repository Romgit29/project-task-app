@props([
    'action',
    'title',
    'projects',
    'model' => null,
    'method' => 'POST'
])

<?php
use App\Enums\TaskStatus;
?>

<x-form.wrap :action="$action" :title="$title" :method="$method">
    <x-form.field name="title" label="Название задачи">
        <input type="text" name="title" id="title" value="{{ old('title', $model?->title) }}" class="form-field">
    </x-form.field>

    <x-form.field name="project_id" label="Проект">
        <select name="project_id" id="project_id" class="form-field bg-white">
            <option value="" disabled hidden {{ !old('project_id', $model?->project_id) ? 'selected' : '' }}></option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}" {{ old('project_id', $model?->project_id) == $project->id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>
    </x-form.field>

    <x-form.field name="status" label="Статус">
        <select name="status" id="status" class="form-field bg-white">
            <option value="" disabled hidden {{ !old('status', $model?->status) ? 'selected' : '' }}></option>
            @foreach(TaskStatus::cases() as $status)
                <option value="{{ $status->value }}" {{ old('status', $model?->status?->value ?? $model?->status) == $status->value ? 'selected' : '' }}>
                    {{ $status->label() }}
                </option>
            @endforeach
        </select>
    </x-form.field>

    <x-form.field name="due_date" label="Дедлайн">
        <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $model?->due_date?->format('Y-m-d')) }}" class="form-field">
    </x-form.field>

    <x-form.field name="description" label="Описание">
        <textarea name="description" id="description" class="form-field">{{ old('description', $model?->description) }}</textarea>
    </x-form.field>

    <div class="flex justify-between">
        <button type="submit" class="btn btn-primary">
            {{ $model ? 'Сохранить' : 'Создать' }}
        </button>

        @if($model)
            <button type="submit" 
                    formaction="{{ route('tasks.destroy', $model) }}" 
                    onclick="this.form.querySelector('input[name=\'_method\']').value='DELETE'; return confirm('Вы уверены, что хотите удалить эту задачу?');" 
                    class="btn btn-danger">
                Удалить
            </button>
        @endif
    </div>
</x-form.wrap>
