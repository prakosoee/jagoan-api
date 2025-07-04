<?php

namespace App\Services;

use App\Interfaces\Repositories\ContributorRepository;

class ContributorService
{
    public function __construct(
        private ContributorRepository $contributorRepository,
        private FileService $fileService
    ) {}

    public function getAllContributors()
    {
        return $this->contributorRepository->getAll();
    }
    public function createContributor(array $contributorRequest)
    {
        $contributor =  $this->contributorRepository->create($contributorRequest);
        $upload_file = $this->fileService->updateFile($contributorRequest['foto_profile'], $contributor->id, 'foto_profile', 'contributor');
        return $contributor;
    }
    public function updateContributor(array $contributorRequest, $id)
    {
        $contributor = $this->contributorRepository->update($id, $contributorRequest);

        if (isset($contributorRequest['foto_profile'])) {
            $this->fileService->updateFile($contributorRequest['foto_profile'], $contributor->id, 'foto_profile', 'contributor');
        }

        return $contributor;
    }
    public function deleteContributor($id)
    {
        return $this->contributorRepository->delete($id);
    }
}
