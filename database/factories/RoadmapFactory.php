<?php 

namespace Database\Factories;

use App\Models\User;
use App\Models\Roadmap;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoadmapFactory extends Factory
{
    protected $model = Roadmap::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'is_published' => $this->faker->boolean,
            'created_by' => User::factory(),
        ];
    }
}
