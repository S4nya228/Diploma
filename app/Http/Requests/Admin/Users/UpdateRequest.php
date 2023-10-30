<?php

namespace App\Http\Requests\Admin\Users;

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
            "first_name" => ['required','min:2', 'max:50', 'string'],
            "last_name" => ['required','min:2', 'max:50', 'string'],
            "middle_name" => ['required','min:2','max:50', 'string'],
            "role_id" => ["required"]
        ];
    }
}
