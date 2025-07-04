<?php

namespace App\Services;

use App\Interfaces\Repositories\RoadmapRepository;

class RoadmapService
{
    public function __construct(
        private RoadmapRepository $roadmapRepository
    ) {}

    public function getAllRoadmaps()
    {
        return $this->roadmapRepository->getAll();
    }
    public function createRoadmap(array $roadmapRequest)
    {
        $roadmap =  $this->roadmapRepository->create($roadmapRequest);
        // $upload_file = $this->fileService->updateFile($roadmapRequest['foto_profile'], $roadmap->id, 'foto_profile', 'roadmap');
        return $roadmap;
    }
    public function updateRoadmap(array $roadmapRequest, $id)
    {
        $roadmap = $this->roadmapRepository->update($id, $roadmapRequest);

        // if (isset($roadmapRequest['foto_profile'])) {
        //     $this->fileService->updateFile($roadmapRequest['foto_profile'], $roadmap->id, 'foto_profile', 'roadmap');
        // }

        return $roadmap;
    }
    public function deleteRoadmap($id)
    {
        return $this->roadmapRepository->delete($id);
    }
}
