<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'level_id' => 'required|integer|exists:levels,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content_type' => 'required|string|in:audio,video,image',
            'content_text' => 'required_if:content_type,text|string',
            'duration_minutes' => 'required_if:content_type,video|integer|min:1',
            'order' => 'required|integer',
            'minimum_score' => 'required|integer|min:0',
            'course_content' => 'required|file|mimes:' . $this->getMimesForContentType() . '|max:10240',
        ];
    }

    private function getMimesForContentType(): string
    {
        $contentType = $this->input('content_type');

        switch ($contentType) {
            case 'video':
                return 'mp4';
            case 'audio':
                return 'mp3';
            case 'image':
                return 'jpeg,jpg,png,gif';
            default:
                return '';
        }
    }

    public function messages(): array
    {
        return [
            'level_id.required' => 'ID level wajib diisi.',
            'level_id.exists' => 'ID level yang dipilih tidak ada.',
            'title.required' => 'Judul wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'content_type.required' => 'Tipe konten wajib diisi.',
            'content_type.in' => 'Tipe konten harus salah satu dari berikut: audio, video, gambar.',
            'content_text.required_if' => 'Konten teks wajib diisi jika tipe konten adalah teks.',
            'duration_minutes.required_if' => 'Durasi wajib diisi jika tipe konten adalah video.',
            'duration_minutes.integer' => 'Durasi harus berupa angka.',
            'duration_minutes.min' => 'Durasi harus minimal 1 menit.',
            'order.required' => 'Urutan wajib diisi.',
            'minimum_score.required' => 'Nilai minimum wajib diisi.',
            'minimum_score.integer' => 'Nilai minimum harus berupa angka.',
            'minimum_score.min' => 'Nilai minimum tidak boleh kurang dari 0.',
            'course_content.required' => 'Konten kursus wajib diisi.',
            'course_content.mimes' => 'Konten kursus harus berupa video (mp4), audio (mp3), atau gambar (jpeg, jpg, png, gif).',
            'course_content.max' => 'Ukuran konten kursus tidak boleh lebih dari 10MB.',
        ];
    }
}
