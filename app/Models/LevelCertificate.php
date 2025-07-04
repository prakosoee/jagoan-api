<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LevelCertificate extends Model
{
    /** @use HasFactory<\Database\Factories\LevelCertificateFactory> */
    use HasFactory;

    protected $fillable = [
        'certificate_number',
        'user_id',
        'level_id',
        'roadmap_id',
        'participant_name',
        'roadmap_title',
        'level_title',
        'completion_date',
        'issue_date',
        'verification_code',
        'certificate_data',
        'is_valid'
    ];

    protected $casts = [
        'completion_date' => 'date',
        'issue_date' => 'date',
        'certificate_data' => 'array',
        'is_valid' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function roadmap()
    {
        return $this->belongsTo(Roadmap::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($certificate) {
            $certificate->certificate_number = 'CERT-' . strtoupper(uniqid());
            $certificate->verification_code = strtoupper(Str::random(10));
            $certificate->issue_date = now()->toDateString();
        });
    }
}
