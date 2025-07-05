<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Models\Level;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use App\Http\Resources\LevelResource;
use App\Services\LevelService;

class LevelController extends Controller
{
    public function __construct(
        private LevelService $levelService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $level = $this->levelService->getAllLevel();
        return ApiResponse::responseWithData(LevelResource::collection($level), 'Level Berhasil ditampilkan');
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
    public function store(StoreLevelRequest $request)
    {
        $levelRequest = $request->validated();
        $level = $this->levelService->createLevel($levelRequest);
        return ApiResponse::responseWithData(new LevelResource($level), 'Level Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLevelRequest $request, $id)
    {
        $levelRequest = $request->validated();
        $levelUpdated = $this->levelService->updateLevel($levelRequest, $id);
        return ApiResponse::responseWithData(new LevelResource($levelUpdated), 'Level Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->levelService->deleteLevel($id);
        return ApiResponse::response('Level Berhasil dihapus');
    }
}
