<?php

namespace Database\Seeders;

use App\Models\Roadmap;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ContributorSeeder::class);
        $this->call(RoadmapSeeder::class);
        $this->call(FlowSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(QuizSeeder::class);
        $this->call(QuizQuestionSeeder::class);


        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);        
    }
}
