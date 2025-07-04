<?php

namespace App\Services;

use App\Helper\ApiResponse;
use App\Interfaces\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class AuthService
{
    public function __construct(
        private UserRepository $userRepository
    ) {}
    
    public function register(array $data) 
    {
        return $this->userRepository->createUser($data);
    }

    public function login(array $credentials)
    {
        if (!$token = Auth::attempt($credentials)) {
            throw new NotFoundHttpException('Invalid username or password');
        }

        return $this->respondToken($token);
    }

    public function refresh()
    {
        try {
            $token = Auth::refresh();

            return $this->respondToken($token);
        } catch (Throwable $th) {
            throw new UnauthorizedHttpException("", "Invalid or expired token");
        }
    }

    public function logout()
    {
        return Auth::logout();
    }

    public function me()
    {
        return Auth::user();
    }

    private function respondToken($token)
    {
        return [
            'token' => $token,
            'expires_in' => Auth::factory()->getTTL() * 60
        ];
    }
}
