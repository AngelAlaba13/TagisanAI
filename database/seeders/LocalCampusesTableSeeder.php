<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalCampusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $campuses = [
            [
                'campus_name' => 'North Estern Mindanao State University - Bislig Campus',
                'campus_code' => 'Bislig Campus',
                'campus_logo' => 'NEMSU_logo.png',
                'campus_description' => 'North Estern Mindanao State University Bislig Campus is nestled in the vibrant city of Bislig, known for its rich cultural heritage and stunning natural landscapes.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'campus_name' => 'North Estern Mindanao State University - Cagwait Campus',
                'campus_code' => 'Cagwait Campus',
                'campus_logo' => 'NEMSU_logo.png',
                'campus_description' => 'North Estern Mindanao State University Cagwait Campus is located in the picturesque town of Cagwait, celebrated for its pristine beaches and warm community spirit.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'campus_name' => 'North Estern Mindanao State University - Cantilan Campus',
                'campus_code' => 'Cantilan Campus',
                'campus_logo' => 'NEMSU_logo.png',
                'campus_description' => 'North Estern Mindanao State University Cantilan Campus is situated in the charming municipality of Cantilan, known for its rich agricultural heritage and vibrant local culture.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'campus_name' => 'North Estern Mindanao State University - Lianga Campus',
                'campus_code' => 'Lianga Campus',
                'campus_logo' => 'NEMSU_logo.png',
                'campus_description' => 'North Estern Mindanao State University Lianga Campus is located in the serene town of Lianga, renowned for its lush landscapes and strong community values.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'campus_name' => 'North Estern Mindanao State University - San Miguel Campus',
                'campus_code' => 'San Miguel Campus',
                'campus_logo' => 'NEMSU_logo.png',
                'campus_description' => 'North Estern Mindanao State University San Miguel Campus is nestled in the vibrant municipality of San Miguel, known for its rich cultural heritage and scenic beauty.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'campus_name' => 'North Estern Mindanao State University - Tagbina Campus',
                'campus_code' => 'Tagbina Campus',
                'campus_logo' => 'NEMSU_logo.png',
                'campus_description' => 'North Estern Mindanao State University Tagbina Campus is located in the picturesque municipality of Tagbina, known for its natural beauty and close-knit community.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'campus_name' => 'North Estern Mindanao State University - Tandag Campus',
                'campus_code' => 'Tandag Campus',
                'campus_logo' => 'NEMSU_logo.png',
                'campus_description' => 'North Estern Mindanao State University Tandag Campus is situated in the bustling city of Tandag, known for its rich history and vibrant community life.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Use the 'intra' connection since the migration used Schema::connection('intra')
        DB::connection('masts')->table('local_masts_campuses')->insert($campuses);
    }
}
