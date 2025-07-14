<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\Roadmap;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevelFactory extends Factory
{
    protected $model = Level::class;

    public function definition(): array
    {
        return [
            'roadmap_id' => Roadmap::factory(),
            'title' => $this->faker->word,
            'description' => $this->faker->optional()->sentence,
            'level_type' => $this->faker->randomElement(['dasar', 'menengah', 'lanjutan']),
            'order' => $this->faker->randomNumber(),
            'is_published' => $this->faker->boolean,
        ];
    }
}

