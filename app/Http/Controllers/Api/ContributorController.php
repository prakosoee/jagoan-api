<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Models\Contributor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ContributorService;
use App\Http\Requests\StoreContributorRequest;
use App\Http\Requests\UpdateContributorRequest;
use App\Http\Resources\ContributorResource;

class ContributorController extends Controller
{
    public function __construct(
        private ContributorService $contributorService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contributors = $this->contributorService->getAllContributors();
        return ApiResponse::responseWithData(ContributorResource::collection($contributors), 'Data Contributor Berhasil ditampilkan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContributorRequest $request)
    {
        $contributorRequest = $request->validated();
        $contributor = $this->contributorService->createContributor($contributorRequest);
        return ApiResponse::responseWithData(new ContributorResource($contributor), 'Data Contributor Berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contributor $contributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contributor $contributor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContributorRequest $request, $id)
    {
        $contributorRequest = $request->validated();
        $contributor = $this->contributorService->updateContributor($contributorRequest, $id);
        return ApiResponse::responseWithData(new ContributorResource($contributor), 'Data Contributor Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->contributorService->deleteContributor($id);
        return ApiResponse::response('Contributor Berhasil Dihapus', 200);
    }
}
