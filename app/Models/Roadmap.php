<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    /** @use HasFactory<\Database\Factories\RoadmapFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'is_published',
        'created_by'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function levels()
    {
        return $this->hasMany(Level::class)->orderBy('order');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'roadmap_id', 'user_id')
            ->withPivot('enrolled_at', 'started_at', 'status', 'current_level_id', 'current_course_id')
            ->withTimestamps();
    }

    public function certificates()
    {
        return $this->hasMany(LevelCertificate::class);
    }

    public function file()
    {
        return $this->hasMany(File::class, 'id_referensi')->where('context', 'roadmap');
    }

    public function flows()
    {
        return $this->hasMany(Flow::class, 'roadmap_id');
    }
}
