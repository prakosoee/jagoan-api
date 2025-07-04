<?php 

namespace App\Interfaces\Repositories;

use App\Interfaces\Base\CreateInterface;
use App\Interfaces\Base\DeleteInterface;
use App\Interfaces\Base\FindByIdInterface;
use App\Interfaces\Base\GetAllInterface;
use App\Interfaces\Base\UpdateInterface;

interface CourseRepository extends CreateInterface, GetAllInterface, UpdateInterface, DeleteInterface, FindByIdInterface
{
    //
}