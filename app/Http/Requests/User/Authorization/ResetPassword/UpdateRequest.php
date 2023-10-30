<?php

namespace App\Http\Requests\User\Authorization\ResetPassword;

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
            "email" => ["required", "email", "string", "exists:users,email"],
            "password" => ["required", "confirmed", "min:8","confirmed"],
            "password_confirmation" => ["required"],
        ];
    }
}
