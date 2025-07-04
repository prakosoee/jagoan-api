<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    /** @use HasFactory<\Database\Factories\QuizAttemptFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'course_progress_id',
        'attempt_number',
        'answers',
        'score',
        'total_questions',
        'correct_answers',
        'is_passed',
        'started_at',
        'completed_at'
    ];

    protected $casts = [
        'answers' => 'array',
        'is_passed' => 'boolean',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function courseProgress()
    {
        return $this->belongsTo(CourseProgress::class);
    }
}
