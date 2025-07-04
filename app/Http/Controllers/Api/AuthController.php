<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\RegisterRequest;


class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {}

    /**
     * @OA\Post(
     *     path="/api/auth/register",
     *     operationId="register",
     *     tags={"Auth"},
     *     summary="Register",
     *     description="Endpoint untuk melakukan register",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "password"},
     *             @OA\Property(property="name", type="string", example="Sinta"),
     *             @OA\Property(property="email", type="string", format="email", example="sinta@gmail.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="password")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Register Berhasil",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Berhasil Register")
     *         )
     *     )
     * )
     */
    public function register(RegisterRequest $request)
    {
        $registerRequest = $request->validated();
        $user = $this->authService->register($registerRequest);
        return ApiResponse::responseWithData(new UserResource($user), 'Berhasil Register', 201);
    }

    /**
     * @OA\Post(
     *     path="/api/auth/login",
     *     operationId="login",
     *     tags={"Auth"},
     *     summary="Login",
     *     description="Endpoint untuk melakukan login",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"username", "password"},
     *                 @OA\Property(property="email", type="string", example="sinta@gmail.com"),
     *                 @OA\Property(property="password", type="string", format="password", example="password")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *          )
     *     ),
     * )
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $result = $this->authService->login($credentials);
        return ApiResponse::responseWithData($result, 'Login successfully');
    }

    /**
     * @OA\Get(
     *      path="/api/auth/me",
     *      operationId="me",
     *      tags={"Auth"},
     *      summary="Me",
     *      description="Endpoint untuk mendapatkan data Current user",
     *     security={
     *          {"bearerAuth": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *          )
     *     ),
     *     )
     */
    public function me()
    {
        $me = $this->authService->me();
        return ApiResponse::responseWithData(new UserResource($me), 'Success get current user');
    }

    /**
     * @OA\Post(
     *      path="/api/auth/refresh",
     *      operationId="refresh",
     *      tags={"Auth"},
     *      summary="refresh",
     *      description="Endpoint untuk refresh token",
     *     security={
     *          {"bearerAuth": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *          )
     *     ),
     *)
     */
    public function refresh()
    {
        $result = $this->authService->refresh();
        return ApiResponse::responseWithData($result, 'Success refresh token');
    }

    /**
     * @OA\Post(
     *      path="/api/auth/logout",
     *      operationId="logout",
     *      tags={"Auth"},
     *      summary="Logout",
     *      description="Endpoint untuk logout",
     *     security={
     *          {"bearerAuth": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *          )
     *     ),
     * )
     */
    public function logout()
    {
        $this->authService->logout();
        return ApiResponse::response('Logout successfully');
    }
}
