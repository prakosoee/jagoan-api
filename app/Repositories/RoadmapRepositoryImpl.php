<?php 

namespace App\Repositories;

use App\Interfaces\Repositories\RoadmapRepository;
use App\Models\Roadmap;

class RoadmapRepositoryImpl implements RoadmapRepository
{
    public function getAll()
    {
        return Roadmap::all();
    }
    public function create(array $data)
    {
        return Roadmap::create($data);
    }

    public function update($id, array $data)
    {
        $roadmap = Roadmap::findOrFail($id);
        $roadmap->update($data);
        return $roadmap;
    }

    public function findByTitle($title)
    {
        $roadmap = Roadmap::where('title', $title)->first();
        // dd($roadmap);
        return $roadmap;
    }

    public function delete($id)
    {
        Roadmap::findOrFail($id)->delete();
    }
}