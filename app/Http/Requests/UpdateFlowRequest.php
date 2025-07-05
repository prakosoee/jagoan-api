<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFlowRequest extends FormRequest
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
            'roadmap_id' => 'sometimes|integer',
            'order' => 'sometimes|integer',
            'name' => 'sometimes|string',
            'description' => 'sometimes|string',
            'icon' => 'sometimes|image|mimes:png,jpg|max:2048',
        ];
    }
}
