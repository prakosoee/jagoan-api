<?php

namespace App\Services;

use App\Interfaces\Repositories\QuizRepository;

class QuizService
{
    public function __construct(
        private QuizRepository $quizRepository
    ) {}

    public function getAllQuiz()
    {
        return $this->quizRepository->getAll();
    }
    public function createQuiz(array $quizRequest)
    {
        $quiz =  $this->quizRepository->create($quizRequest);
        return $quiz;
    }
    public function updateQuiz(array $quizRequest, $id)
    {
        $quiz = $this->quizRepository->update($id, $quizRequest);
        return $quiz;
    }
    public function deleteQuiz($id)
    {
        return $this->quizRepository->delete($id);
    }
}
