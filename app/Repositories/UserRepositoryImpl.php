<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Repositories\UserRepository;

class UserRepositoryImpl implements UserRepository
{
    public function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'] ?? 'peserta',
            'phone' => $data['phone'] ?? null,
            'full_name' => $data['full_name'],
            'job' => $data['job'] ?? null,
            'organization' => $data['organization'] ?? null,
            'source_information' => $data['source_information'] ?? null,
        ]);
    }

    public function getAllUser()
    {
        return User::where('role', 'peserta')->get();
    }
}
