<?php

namespace App\Repositories;

use App\Interfaces\Repositories\FileRepository;
use App\Models\File;

class FileRepositoryImpl implements FileRepository
{
    public function create(array $data)
    {
        return File::create($data);
    }

    public function update($id, array $data)
    {
        $file = File::findOrFail($id);
        $file->update($data);
        return $file;
    }

    public function findById($id)
    {
        return File::findOrFail($id);
    }

    public function delete($id)
    {
        File::findOrFail($id)->delete();
    }

    public function getByTypeandReferenceId(string $type, $id_referensi, $context)
    {
        $file = File::where('context', $context)->where('id_referensi', $id_referensi)->where('type', $type)->first();
        return $file;
    }
}
