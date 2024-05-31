<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'project_url' => 'nullable',
            'source_code_url' => 'nullable',
            'description' => 'required|string',
            'type_id' => 'required|exists:types,id', 
            'cover_image' => 'nullable|image|max:2048',
        ];
    }
}
