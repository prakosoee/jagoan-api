<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContributorRequest extends FormRequest
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
            'name' => 'required|string',
            'role' => 'required|string',
            'skill' => 'required|string',
            'bio' => 'required|string',
            'experience' => 'required|string',
            'contributions' => 'required|json',
            'achievements' => 'required|json',
            'social_media' => 'required|json',
            'foto_profile' => 'required|image|mimes:png,jpg|max:2048',
        ];
    }
}
