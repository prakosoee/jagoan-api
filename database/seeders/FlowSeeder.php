<?php

namespace Database\Seeders;

use App\Models\Flow;
use App\Models\Roadmap;
use Illuminate\Database\Seeder;

class FlowSeeder extends Seeder
{
    /**
     * Menjalankan seeder untuk tabel flows.
     *
     * @return void
     */
    public function run(): void
    {
        Roadmap::all()->each(function ($roadmap) {
            Flow::factory()->count(3)->create([
                'roadmap_id' => $roadmap->id,
            ]);
        });
    }
}

