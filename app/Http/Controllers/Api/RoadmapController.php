<?php

namespace App\Http\Controllers\Api;

use App\Models\Roadmap;
use App\Helper\ApiResponse;
use App\Services\RoadmapService;
use Database\Seeders\RoadmapSeeder;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoadmapResource;
use App\Http\Requests\StoreRoadmapRequest;
use App\Http\Requests\UpdateRoadmapRequest;
use App\Http\Resources\RoadmapByNameResource;

class RoadmapController extends Controller
{
    public function __construct(
        private RoadmapService $roadmapService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roadmap = $this->roadmapService->getAllRoadmaps();
        return ApiResponse::responseWithData(RoadmapResource::collection($roadmap), 'Data Roadmap Berhasil ditampilkan');
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
    public function store(StoreRoadmapRequest $request)
    {
        $roadmapRequest = $request->validated();
        $roadmap = $this->roadmapService->createRoadmap($roadmapRequest);
        return ApiResponse::responseWithData(new RoadmapResource($roadmap), 'Data Roadmap Berhasil ditambah', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roadmap $roadmap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoadmapRequest $request, $id)
    {
        $roadmapRequest = $request->validated();
        $roadmap = $this->roadmapService->updateRoadmap($roadmapRequest, $id);
        return ApiResponse::responseWithData(new RoadmapResource($roadmap), 'Data Roadmap Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $roadmap = $this->roadmapService->deleteRoadmap($id);
        return ApiResponse::response('Roadmap berhasil dihapus');
    }

    public function getRoadmap($title)
    {
        $roadmap = $this->roadmapService->getRoadmapByName($title);
        // dd($roadmap);
        return ApiResponse::responseWithData(new RoadmapByNameResource($roadmap), "data Roadmap ".$roadmap->title." berhasil ditampilkan");
    }
}
