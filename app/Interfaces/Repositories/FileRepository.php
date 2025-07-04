<?php 

namespace App\Interfaces\Repositories;

use App\Interfaces\Base\CreateInterface;
use App\Interfaces\Base\DeleteInterface;
use App\Interfaces\Base\UpdateInterface;
use App\Interfaces\Base\FindByIdInterface;

interface FileRepository extends CreateInterface, DeleteInterface, UpdateInterface, FindByIdInterface
{
    public function getByTypeandReferenceId(string $type, $idReferensi, $context);
}