<?php

namespace App\Http\Requests\Admin\Proposals;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => ['required', 'min:10', 'max:255', 'string'],
            "description" => ['required', 'min:50', 'max:5000', 'string'],
            "response" => ['nullable', 'min:30','max:5000', 'string'],
            "region_id" => ["required"],
            "is_approved" => ["required"],
        ];
    }
}
