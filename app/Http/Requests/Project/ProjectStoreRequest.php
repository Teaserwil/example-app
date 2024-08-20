<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    //public function authorize(): bool
    //{
    //    return false;
    //}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:200'],
            'owner_id' => ['required', 'string', 'exists:users,id'],
            'is_active' => ['required', 'string'],
            'deadline_date' => ['required', 'string', 'date_format:d.m.Y'],
            'assignee_id' => ['required', 'string', 'exists:users,id'],
        ];
    }
}
