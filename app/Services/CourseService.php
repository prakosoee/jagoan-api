<?php

namespace App\Services;

use App\Interfaces\Repositories\CourseRepository;

class CourseService
{
    public function __construct(
        private CourseRepository $courseRepository
    ) {}

    public function getAllCourse()
    {
        return $this->courseRepository->getAll();
    }
    public function createCourse(array $courseRequest)
    {
        $course =  $this->courseRepository->create($courseRequest);
        return $course;
    }
    public function updateCourse(array $courseRequest, $id)
    {
        $course = $this->courseRepository->update($id, $courseRequest);

        // if (isset($contributorRequest['foto_profile'])) {
        //     $this->fileService->updateFile($contributorRequest['foto_profile'], $contributor->id, 'foto_profile', 'contributor');
        // }

        return $course;
    }
    public function deleteCourse($id)
    {
        return $this->courseRepository->delete($id);
    }
}
