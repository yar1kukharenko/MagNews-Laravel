<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => 'nullable|string',
            'patronymic' => 'nullable|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|between:8,255|confirmed',
            'age' => 'nullable|integer',
            'gender' => 'required|integer',
            'role' => 'required|integer'
        ];
    }
}
