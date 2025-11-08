<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\IntraCollegesTableSeeder;

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

    }
}
