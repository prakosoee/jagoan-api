<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    /** @use HasFactory<\Database\Factories\ContributorFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'skill',
        'bio',
        'experience',
        'contributions',
        'achievements',
        'social_media',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function file()
    {
        return $this->hasMany(File::class, 'id_referensi')->where('context', 'contributor');
    }
}
