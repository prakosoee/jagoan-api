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
        'profile_picture',
        'contributions',
        'achievements',
        'is_active'
    ];

    protected $casts = [
        'contributions' => 'array',
        'achievements' => 'array',
        'is_active' => 'boolean',
    ];
}
