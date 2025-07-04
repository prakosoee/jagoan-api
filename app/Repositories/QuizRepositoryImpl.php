<?php 

namespace App\Repositories;

use App\Models\Quiz;
use App\Interfaces\Repositories\QuizRepository;

class QuizRepositoryImpl implements QuizRepository
{
    public function getAll()
    {
        return Quiz::all();
    }
    public function create(array $data)
    {
        return Quiz::create($data);
    }

    public function update($id, array $data)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->update($data);
        return $quiz;
    }

    public function findById($id)
    {
        return Quiz::findOrFail($id);
    }

    public function delete($id)
    {
        Quiz::findOrFail($id)->delete();
    }
}