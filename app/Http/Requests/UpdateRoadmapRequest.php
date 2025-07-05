<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoadmapRequest extends FormRequest
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
            "title" => "sometimes|string",
            "description" => "sometimes|string",
            "created_by" => "sometimes|string",
            "thumbnail" => "sometimes|file|mimes:jpg,jpeg,png,mp4,avi,mkv|max:10240", // Add file type and size constraints
        ];
    }
}
