<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'order' => $this->order,
            'title' => $this->title,
            'description' => $this->description,
            'content_type' => $this->content_type,
            'content_text' => $this->content_text,
            'duration_minutes' => $this->duration_minutes,
            'file' => FileResource::collection($this->file)
        ];
    }
}
