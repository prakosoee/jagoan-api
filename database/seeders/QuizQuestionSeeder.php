<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Database\Seeder;

class QuizQuestionSeeder extends Seeder
{
    public function run(): void
    {
        Quiz::all()->each(function ($quiz) {
            QuizQuestion::factory()->count(3)->create([
                'quiz_id' => $quiz->id,
            ]);
        });
    }
}

