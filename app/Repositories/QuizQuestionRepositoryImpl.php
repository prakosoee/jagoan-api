<?php 

namespace App\Repositories;

use App\Interfaces\Repositories\QuizQuestionRepository;
use App\Models\QuizQuestion;

class QuizQuestionRepositoryImpl implements QuizQuestionRepository
{
    public function getAll()
    {
        return QuizQuestion::all();
    }
    public function create(array $data)
    {
        return QuizQuestion::create($data);
    }

    public function update($id, array $data)
    {
        $question = QuizQuestion::findOrFail($id);
        $question->update($data);
        return $question;
    }

    public function findById($id)
    {
        return QuizQuestion::findOrFail($id);
    }

    public function delete($id)
    {
        QuizQuestion::findOrFail($id)->delete();
    }
}