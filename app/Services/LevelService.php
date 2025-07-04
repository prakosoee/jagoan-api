<?php

namespace App\Services;

use App\Interfaces\Repositories\LevelRepository;

class LevelService
{
    public function __construct(
        private LevelRepository $levelRepository
    ) {}

    public function getAllLevel()
    {
        return $this->levelRepository->getAll();
    }
    public function createLevel(array $levelRequest)
    {
        $level =  $this->levelRepository->create($levelRequest);
        return $level;
    }
    public function updateLevel(array $levelRequest, $id)
    {
        $level = $this->levelRepository->update($id, $levelRequest);

        // if (isset($contributorRequest['foto_profile'])) {
        //     $this->fileService->updateFile($contributorRequest['foto_profile'], $contributor->id, 'foto_profile', 'contributor');
        // }

        return $level;
    }
    public function deleteLevel($id)
    {
        return $this->levelRepository->delete($id);
    }
}
