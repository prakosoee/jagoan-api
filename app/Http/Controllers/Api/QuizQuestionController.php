<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Models\QuizQuestion;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuizQuestionRequest;
use App\Http\Requests\UpdateQuizQuestionRequest;
use App\Http\Resources\QuizQuestionResource;
use App\Services\QuizQuestionService;

class QuizQuestionController extends Controller
{
    public function __construct(
        private QuizQuestionService $quizQuestionService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function store(StoreQuizQuestionRequest $request)
    {
        $quizQuestionRequest = $request->validated();
        $quizQuestion = $this->quizQuestionService->createQuizQuestion($quizQuestionRequest);
        return ApiResponse::responseWithData(new QuizQuestionResource($quizQuestion), 'Quiz Question berhasil dibuat', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(QuizQuestion $quizQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuizQuestion $quizQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizQuestionRequest $request, $id)
    {
        $quizQuestionRequest = $request->validated();
        $quizQuestionUpdated = $this->quizQuestionService->updateQuizQuestion($quizQuestionRequest, $id);
        return ApiResponse::responseWithData(new QuizQuestionResource($quizQuestionUpdated), 'Quiz Question berhasil diupdate', 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->quizQuestionService->deleteQuizQuestion($id);
        return ApiResponse::response('Data Question Berhasil dihapus');
    }
}
