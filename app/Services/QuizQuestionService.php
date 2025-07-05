<?php 

namespace App\Services;

use App\Interfaces\Repositories\QuizQuestionRepository;

class QuizQuestionService
{
    public function __construct(
        private QuizQuestionRepository $quizQuestionRepository
    ){}

        public function getAllQuizQuestion()
    {
        return $this->quizQuestionRepository->getAll();
    }
    public function createQuizQuestion(array $quizQuestionRequest)
    {
        $quizQuestion =  $this->quizQuestionRepository->create($quizQuestionRequest);
        return $quizQuestion;
    }
    public function updateQuizQuestion(array $quizQuestionRequest, $id)
    {
        $quizQuestion = $this->quizQuestionRepository->update($id, $quizQuestionRequest);

        return $quizQuestion;
    }
    public function deleteQuizQuestion($id)
    {
        return $this->quizQuestionRepository->delete($id);
    }
}