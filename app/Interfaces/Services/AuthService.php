<?php

namespace App\Interfaces\Services;

interface AuthService
{
    public function register (array $data);
    public function login(array $credentials);
    public function me();
    public function refresh();
    public function logout();
}
