<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\intramurals\intraLeaderboard;
use App\Models\intramurals\intraColleges;
use App\Models\intramurals\intraEvent;

class IntraLeaderboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colleges = intraColleges::all();
        $events = intraEvent::all();


        /**
         * 1️⃣ ALWAYS create a leaderboard row for each campus
         *     with NO EVENT (event_id = null)
         */
        foreach ($colleges as $college) {
            intraLeaderboard::firstOrCreate(
                [
                    'college_id' => $college->id,
                    'event_id' => null,   // NULL means general campus points
                ],
                [
                    'gold' => 0,
                ]
            );
        }

        foreach ($colleges as $college) {
            foreach ($events as $event) {
                intraLeaderboard::firstOrCreate([
                    'college_id' => $college->id,
                    'event_id' => $event->id,
                ], [
                    'gold' => 0,
                ]);
            }
        }
    }
}
