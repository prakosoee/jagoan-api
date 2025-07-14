<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Level::all()->each(function ($level) {
            Course::factory()->count(10)->create([
                'level_id' => $level->id,
            ]);
        });
    }
}

