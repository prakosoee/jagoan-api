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
        'bio',
        'experience',
        'contributions',
        'achievements',
        'is_active'
    ];

    protected $casts = [
        'contributions' => 'array',
        'achievements' => 'array',
        'is_active' => 'boolean',
    ];

    public function file()
    {
        return $this->hasMany(File::class, 'id_referensi')->where('context', 'contributor');
    }
}
