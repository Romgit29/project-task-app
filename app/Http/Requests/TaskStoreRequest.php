<?php

namespace App\Http\Requests;

use App\Enums\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'project_id' => 'required|integer|exists:projects,id',
            'status' => ['string', Rule::in(TaskStatus::values())],
            'due_date' => 'nullable|date',
            'description' => 'nullable|max:65535',
        ];
    }
}
