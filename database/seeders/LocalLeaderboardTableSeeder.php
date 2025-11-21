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


        /**
         * 1️⃣ ALWAYS create a leaderboard row for each campus
         *     with NO EVENT (event_id = null)
         */
        foreach ($campuses as $campus) {
            localLeaderboard::firstOrCreate(
                [
                    'campus_id' => $campus->id,
                    'event_id' => null,   // NULL means general campus points
                ],
                [
                    'gold' => 0,
                ]
            );
        }


        /**
         * 2️⃣ If events exist, create leaderboard rows PER EVENT
         */
        foreach ($localEvents as $event) {
            foreach ($campuses as $campus) {
                localLeaderboard::firstOrCreate(
                    [
                        'campus_id' => $campus->id,
                        'event_id' => $event->id,
                    ],
                    [
                        'gold' => 0,
                    ]
                );
            }
        }
    }
}
