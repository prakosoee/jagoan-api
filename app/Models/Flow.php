<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
    /** @use HasFactory<\Database\Factories\FlowFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'roadmap_id',
        'order',
        'name',
        'description'
    ];

    public function roadmap()
    {
        return $this->belongsTo(Roadmap::class);
    }

    public function file()
    {
        return $this->hasMany(File::class, 'id_referensi')->where('context', 'flow');
    }
}
