<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    /** @use HasFactory<\Database\Factories\EnrollmentFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'roadmap_id',
        'enrolled_at',
        'started_at',
        'current_level_id',
        'current_course_id',
        'status'
    ];

    protected $casts = [
        'enrolled_at' => 'datetime',
        'started_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function roadmap()
    {
        return $this->belongsTo(Roadmap::class);
    }

    public function currentLevel()
    {
        return $this->belongsTo(Level::class, 'current_level_id');
    }

    public function currentCourse()
    {
        return $this->belongsTo(Course::class, 'current_course_id');
    }

    public function courseProgresses()
    {
        return $this->hasMany(CourseProgress::class);
    }
}
