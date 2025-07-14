<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Http\Resources\ParticipantResource;
use App\Services\ParticipantService;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function __construct(
        private ParticipantService $participantService
    ){}

    public function index()
    {
        $participants = $this->participantService->getParticipants();
        return ApiResponse::responseWithData(ParticipantResource::collection($participants), 'Data Peserta Berhasil Ditampilkan');
    }
}
