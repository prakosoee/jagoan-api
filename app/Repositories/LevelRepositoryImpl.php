<?php 

namespace App\Repositories;

use App\Interfaces\Repositories\LevelRepository;
use App\Models\Level;

class LevelRepositoryImpl implements LevelRepository
{
    public function getAll()
    {
        return Level::all();
    }
    public function create(array $data)
    {
        return Level::create($data);
    }

    public function update($id, array $data)
    {
        $level = Level::findOrFail($id);
        $level->update($data);
        return $level;
    }

    public function findById($id)
    {
        return Level::findOrFail($id);
    }

    public function delete($id)
    {
        Level::findOrFail($id)->delete();
    }
}