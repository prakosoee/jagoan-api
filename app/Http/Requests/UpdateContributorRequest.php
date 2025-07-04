<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContributorRequest extends FormRequest
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
            'name' => 'sometimes|string',
            'role' => 'sometimes|string',
            'bio' => 'sometimes|string',
            'experience' => 'sometimes|string',
            'contributions' => 'sometimes|json',
            'achievements' => 'sometimes|json',
            'foto_profile' => 'sometimes|image|mimes:png,jpg|max:2048',
        ];
    }
}
