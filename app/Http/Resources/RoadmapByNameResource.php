<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoadmapByNameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'created_by' => $this->creator->name,
            'file' => FileResource::collection($this->file),
            'flow' => FlowResource::collection($this->flows),
            'level' => LevelResource::collection($this->levels),
        ];
    }
}
