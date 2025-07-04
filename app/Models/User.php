<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'profile_picture',
        'total_learning_time',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'email_verified_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    // Relationship untuk admin - roadmaps yang dibuat
    public function roadmaps()
    {
        return $this->hasMany(Roadmap::class, 'created_by');
    }

    // Relationship untuk peserta - enrollments
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // Relationship untuk peserta - course progresses
    public function courseProgresses()
    {
        return $this->hasMany(CourseProgress::class);
    }

    // Relationship untuk peserta - quiz attempts
    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

    // Relationship untuk peserta - certificates
    public function certificates()
    {
        return $this->hasMany(LevelCertificate::class);
    }

    // Relationship untuk peserta - enrolled roadmaps
    public function enrolledRoadmaps()
    {
        return $this->belongsToMany(Roadmap::class, 'enrollments', 'user_id', 'roadmap_id')
            ->withPivot('enrolled_at', 'started_at', 'status', 'current_level_id', 'current_course_id')
            ->withTimestamps();
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
