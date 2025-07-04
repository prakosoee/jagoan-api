<?php 

namespace App\Repositories;

use App\Interfaces\Repositories\ContributorRepository;
use App\Models\Contributor;

class ContributorRepositoryImpl implements ContributorRepository
{
    public function create(array $data)
    {
        return Contributor::create($data);
    }
    public function getAll()
    {
        return Contributor::all();
    }
    public function update($id, array $data)
    {
        $contributor = Contributor::findOrFail($id);
        $contributor->update($data);
        return $contributor;
    }
    public function delete($id)
    {
        Contributor::findOrFail($id)->delete();
    }
}