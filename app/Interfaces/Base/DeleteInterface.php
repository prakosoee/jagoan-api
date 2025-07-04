<?php 

namespace App\Interfaces\Base;

use Illuminate\Database\Eloquent\Model;

interface DeleteInterface
{
    public function delete($id);
}