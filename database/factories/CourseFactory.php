<?php

namespace database\factories;

use App\Models\Course;
use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'level_id' => Level::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'content_type' => $this->faker->randomElement(['video', 'audio', 'text', 'image']),
            'content_text' => $this->faker->optional()->text,
            'duration_minutes' => $this->faker->numberBetween(30, 120),
            'order' => $this->faker->randomNumber(),
            'minimum_score' => $this->faker->numberBetween(50, 100),
            'is_published' => $this->faker->boolean,
        ];
    }
}

