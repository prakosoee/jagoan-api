<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Http\Resources\FlowResource;
use App\Models\Flow;
use App\Http\Requests\StoreFlowRequest;
use App\Http\Requests\UpdateFlowRequest;
use App\Services\FlowService;

class FlowController extends Controller
{
    public function __construct(
        private FlowService $flowService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreFlowRequest $request)
    {
        $flowRequest = $request->validated();
        $flow = $this->flowService->createFlow($flowRequest);
        return ApiResponse::responseWithData(new FlowResource($flow), 'Flow berhasil dibuat', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Flow $flow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flow $flow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFlowRequest $request, $id)
    {
        $flowRequest = $request->validated();
        $flow = $this->flowService->updateFlow($flowRequest, $id);
        return ApiResponse::responseWithData(new FlowResource($flow), 'Flow berhasil diupdate', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted_flow = $this->flowService->deleteFlow($id);
        return ApiResponse::response('Flow Berhasil dihapus');
    }
}
