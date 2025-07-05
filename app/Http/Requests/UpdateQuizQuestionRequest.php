<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizQuestionRequest extends FormRequest
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
            'quiz_id' => 'sometimes|integer|exists:quizzes,id',
            'question' => 'sometimes|string|max:1000',
            'option_a' => 'sometimes|string|max:255',
            'option_b' => 'sometimes|string|max:255',
            'option_c' => 'sometimes|string|max:255',
            'option_d' => 'sometimes|string|max:255',
            'correct_answer' => 'sometimes|in:A,B,C,D',
            'order' => 'sometimes|integer|min:1',
        ];
    }
}
