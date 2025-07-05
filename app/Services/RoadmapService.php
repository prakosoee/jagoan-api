<?php

namespace App\Services;

use App\Interfaces\Repositories\RoadmapRepository;

class RoadmapService
{
    public function __construct(
        private RoadmapRepository $roadmapRepository,
        private FileService $fileService
    ) {}

    public function getAllRoadmaps()
    {
        return $this->roadmapRepository->getAll();
    }
    public function createRoadmap(array $roadmapRequest)
    {
        $roadmap =  $this->roadmapRepository->create($roadmapRequest);
        $upload_file = $this->fileService->updateFile($roadmapRequest['thumbnail'], $roadmap->id, 'thumbnail', 'roadmap');
        return $roadmap;
    }
    public function updateRoadmap(array $roadmapRequest, $id)
    {
        $roadmap = $this->roadmapRepository->update($id, $roadmapRequest);

        if (isset($roadmapRequest['thumbnail'])) {
            $this->fileService->updateFile($roadmapRequest['thumbnail'], $roadmap->id, 'thumbnail', 'roadmap');
        }

        return $roadmap;
    }
    public function deleteRoadmap($id)
    {
        return $this->roadmapRepository->delete($id);
    }
}
