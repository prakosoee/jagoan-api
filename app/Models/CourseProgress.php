<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseProgress extends Model
{
    /** @use HasFactory<\Database\Factories\CourseProgressFactory> */
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'course_id',
        'user_id',
        'status',
        'score',
        'time_spent_minutes',
        'started_at',
        'completed_at'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }
}
