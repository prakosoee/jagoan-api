<?php

namespace App\Repositories;

use App\Models\Course;
use App\Interfaces\Repositories\CourseRepository;

class CourseRepositoryImpl implements CourseRepository
{
    public function getAll()
    {
        return Course::all();
    }
    public function create(array $data)
    {
        return Course::create($data);
    }

    public function update($id, array $data)
    {
        $course = Course::findOrFail($id);
        $course->update($data);
        return $course;
    }

    public function findById($id)
    {
        return Course::findOrFail($id);
    }

    public function delete($id)
    {
        Course::findOrFail($id)->delete();
    }
}
