<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\Course;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        Course::all()->each(function ($course) {
            Quiz::factory()->count(5)->create([
                'course_id' => $course->id,
            ]);
        });
    }
}

