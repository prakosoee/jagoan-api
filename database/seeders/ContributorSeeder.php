<?php

namespace Database\Seeders;

use App\Models\Contributor;
use Illuminate\Database\Seeder;

class ContributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contributor::factory()->withProfile()->count(10)->create();
    }
}
