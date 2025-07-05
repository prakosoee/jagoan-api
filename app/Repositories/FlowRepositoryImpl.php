<?php 

namespace App\Repositories;

use App\Interfaces\Repositories\FlowRepository;
use App\Models\Flow;

class FlowRepositoryImpl implements FlowRepository
{
    public function getAll()
    {
        return Flow::all();
    }
    public function create(array $data)
    {
        return Flow::create($data);
    }

    public function update($id, array $data)
    {
        $flow = Flow::findOrFail($id);
        $flow->update($data);
        return $flow;
    }

    public function findById($id)
    {
        return Flow::findOrFail($id);
    }

    public function delete($id)
    {
        Flow::findOrFail($id)->delete();
    }
}