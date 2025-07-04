<?php 

namespace App\Interfaces\Base;

interface UpdateInterface
{
    public function update($id, array $data);
}