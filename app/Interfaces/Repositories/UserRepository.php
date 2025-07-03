<?php 

namespace App\Interfaces\Repositories;

interface UserRepository
{
    public function createUser(array $data);
}