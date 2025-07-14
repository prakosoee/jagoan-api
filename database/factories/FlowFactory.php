<?php

namespace Database\Factories;

use App\Models\Flow;
use App\Models\Roadmap;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlowFactory extends Factory
{
    protected $model = Flow::class;

    public function definition(): array
    {
        return [
            'roadmap_id' => Roadmap::factory(),
            'order' => $this->faker->randomNumber(),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }
}

