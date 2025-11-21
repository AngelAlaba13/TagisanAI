<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\IntraCollegesTableSeeder;
use Database\Seeders\IntraLeaderboardSeeder;
use Database\Seeders\LocalCampusesTableSeeder;
use Database\Seeders\LocalLeaderboardTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Seed intra colleges
        $this->call(IntraCollegesTableSeeder::class);

        // Seed intra leaderboard
        $this->call(IntraLeaderboardSeeder::class);

        // Seed local campuses
        $this->call(LocalCampusesTableSeeder::class);

        // Seed local leaderboard
        $this->call(LocalLeaderboardTableSeeder::class);
    }
}
