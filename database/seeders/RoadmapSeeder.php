<?php

namespace Database\Seeders;

use App\Models\Roadmap;
use Illuminate\Database\Seeder;

class RoadmapSeeder extends Seeder
{
    /**
     * Menjalankan seeder untuk tabel roadmaps.
     *
     * @return void
     */
    public function run(): void
    {
        Roadmap::factory()->count(5)->create();
    }
}
