<?php

namespace App\Http\Requests\Article;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|file',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения.',
            'title.string' => 'Данные должны соответствовать строчному типу.',
            'content.required' => 'Это поле необходимо для заполнения.',
            'content.string' => 'Данные должны соответствовать строчному типу.',
            'image.required' => 'Это поле необходимо для заполнения.',
            'image.file' => 'Данные должны соответствовать файловому типу.',
            'category_id.required' => 'Это поле необходимо для заполнения.',
            'category_id.integer' => 'Данные должны соответствовать числовому типу.',
            'category_id.exists' => 'Данные должны существовать.',

        ];
    }
}
