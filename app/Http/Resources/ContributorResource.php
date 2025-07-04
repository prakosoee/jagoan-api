<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContributorResource extends JsonResource
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
            'name' => $this->name,
            'role' => $this->role,
            'skill' => $this->skill,
            'bio' => $this->bio,
            'experience' => $this->experience,
            'contributions' => json_decode($this->contributions),
            'achievements' => json_decode($this->achievements),
            'social_media' => json_decode($this->social_media),
            'file' => FileResource::collection($this->file),
        ];
    }
}
