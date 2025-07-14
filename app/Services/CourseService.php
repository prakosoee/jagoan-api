<?php

namespace App\Services;

use App\Interfaces\Repositories\CourseRepository;

class CourseService
{
    public function __construct(
        private CourseRepository $courseRepository,
        private FileService $fileService
    ) {}

    public function getAllCourse()
    {
        return $this->courseRepository->getAll();
    }
    public function createCourse(array $courseRequest)
    {
        // dd($courseRequest);
        $course =  $this->courseRepository->create($courseRequest);

        if (isset($courseRequest['course_content'])) {
            $this->fileService->updateFile($courseRequest['course_content'], $course->id, 'course_content', 'course');
        }
        // $this->fileService->updateFile($courseRequest['course_content'], $course->id, 'course_content', 'course');
        return $course;
    }
    public function updateCourse(array $courseRequest, $id)
    {
        $course = $this->courseRepository->update($id, $courseRequest);

        if (isset($courseRequest['course_content'])) {
            $this->fileService->updateFile($courseRequest['course_content'], $course->id, 'course_content', 'course');
        }

        return $course;
    }
    public function deleteCourse($id)
    {
        return $this->courseRepository->delete($id);
    }

    public function findCourse($id)
    {
        return $this->courseRepository->findById($id);
    }
}
