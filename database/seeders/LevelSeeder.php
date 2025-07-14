<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Roadmap;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        Roadmap::all()->each(function ($roadmap) {
            Level::factory()->count(3)->create([
                'roadmap_id' => $roadmap->id,
            ]);
        });
    }
}

