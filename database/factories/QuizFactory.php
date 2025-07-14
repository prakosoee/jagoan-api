<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->optional()->text,
            'time_limit_minutes' => $this->faker->optional()->numberBetween(10, 60),
            'max_attempts' => $this->faker->numberBetween(1, 3),
            'passing_score' => $this->faker->numberBetween(60, 80),
        ];
    }
}
