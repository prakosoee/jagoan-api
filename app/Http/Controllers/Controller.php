<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="1.0.0",
 * )
 * @OA\Server(
 *     url="http://localhost:8000",
 *     description="Localhost"
 * )
 * @OA\Server(
 *     url="http://jagoan-api.test/",
 *     description="jagoan-api.test"
 * )
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */

abstract class Controller
{
    //
}
