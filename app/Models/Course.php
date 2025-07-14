<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'level_id',
        'title',
        'description',
        'content_type',
        'content_text',
        'content_link',
        'duration_minutes',
        'order',
        'minimum_score',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    public function progresses()
    {
        return $this->hasMany(CourseProgress::class);
    }

    public function currentEnrollments()
    {
        return $this->hasMany(Enrollment::class, 'current_course_id');
    }

    public function file()
    {
        return $this->hasMany(File::class, 'id_referensi')->where('context', 'course');
    }
}
