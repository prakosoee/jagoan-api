<?php 

namespace App\Services;

use App\Interfaces\Repositories\UserRepository;

class ParticipantService
{
    public function __construct(
        private UserRepository $userRepository
    ){}

    public function getParticipants()
    {
        return $this->userRepository->getAllUser();
    }
}