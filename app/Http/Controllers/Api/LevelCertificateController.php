<?php

namespace App\Http\Controllers\Api;
use App\Models\LevelCertificate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLevelCertificateRequest;
use App\Http\Requests\UpdateLevelCertificateRequest;

class LevelCertificateController extends Controller
{
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
    public function store(StoreLevelCertificateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LevelCertificate $levelCertificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LevelCertificate $levelCertificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLevelCertificateRequest $request, LevelCertificate $levelCertificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LevelCertificate $levelCertificate)
    {
        //
    }
}
