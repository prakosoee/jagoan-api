<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Models\Quiz;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Http\Resources\QuizResource;
use App\Services\QuizService;

class QuizController extends Controller
{
    public function __construct(
        private QuizService $quizService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quiz = $this->quizService->getAllQuiz();
        return ApiResponse::responseWithData(QuizResource::collection($quiz), 'Daftar Quiz berhasil ditampilkan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizRequest $request)
    {
        $quizRequest = $request->validated();
        $quiz = $this->quizService->createQuiz($quizRequest);
        return ApiResponse::responseWithData(new QuizResource($quiz), 'Quiz berhasil dibuat', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizRequest $request, $id)
    {
        $quizRequest = $request->validated();
        $quizUpdated = $this->quizService->updateQuiz($quizRequest, $id);
        return ApiResponse::responseWithData(new QuizResource($quizUpdated), 'Quiz berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->quizService->deleteQuiz($id);
        return ApiResponse::response('Quiz berhasil dihapus');
    }
}
