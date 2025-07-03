<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\Services\AuthService;


class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {}

    public function register(RegisterRequest $request)
    {
        $registerRequest = $request->validated();
        $user = $this->authService->register($registerRequest);
        return ApiResponse::responseWithData(new UserResource($user), 'Berhasil Register', 201);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $result = $this->authService->login($credentials);
        return ApiResponse::responseWithData($result, 'Login successfully');
    }

    public function me()
    {
        $me = $this->authService->me();
        return ApiResponse::responseWithData(new UserResource($me), 'Success get current user');
    }

    public function refresh()
    {
        $result = $this->authService->refresh();
        return ApiResponse::responseWithData($result, 'Success refresh token');
    }

    public function logout()
    {
        $this->authService->logout();
        return ApiResponse::response('Logout successfully');
    }
}
