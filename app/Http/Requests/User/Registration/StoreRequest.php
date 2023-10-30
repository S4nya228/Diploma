<?php

namespace App\Http\Requests\User\Registration;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            "first_name" => ["required", "min:2", "max:30", "string", "regex:/\p{Cyrillic}/u"],
            "last_name" => ["required", "min:2", "max:30", "string", "regex:/\p{Cyrillic}/u"],
            "middle_name" => ["required", "min:2", "max:30", "string", "regex:/\p{Cyrillic}/u"],
            "email" => ["required", "email:rfc,dns", "string", "unique:users,email"],
            "phone_number" => ["required", 'regex:/^(?:\+38)?[0-9]{10}$/', "unique:users,phone_number"],
            "password" => ["required", "confirmed", "min:8"],
            "checkbox" => ["accepted"]
        ];
    }
}
