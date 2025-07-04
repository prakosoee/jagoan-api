<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /** @use HasFactory<\Database\Factories\LevelFactory> */
    use HasFactory;

    protected $fillable = [
        'roadmap_id',
        'title',
        'description',
        'level_type',
        'order',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function roadmap()
    {
        return $this->belongsTo(Roadmap::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class)->orderBy('order');
    }

    public function certificates()
    {
        return $this->hasMany(LevelCertificate::class);
    }

    public function currentEnrollments()
    {
        return $this->hasMany(Enrollment::class, 'current_level_id');
    }
}
