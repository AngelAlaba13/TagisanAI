<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\localMasts\localLeaderboard;
use App\Models\localMasts\localCampuses;
use App\Models\localMasts\localEvent;

class LocalLeaderboardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campuses = localCampuses::all();
        $localEvents = localEvent::all();

        foreach ($campuses as $campus) {
            foreach ($localEvents as $event) {
                localLeaderboard::firstOrCreate([
                    'campus_id' => $campus->id,
                    'event_id' => $event->id,
                ], [
                    'gold' => 0,
                ]);
            }
        }
    }
}
