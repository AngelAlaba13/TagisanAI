<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntraCollegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $colleges = [
            [
                'college_name' => 'College of Arts and Sciences',
                'college_code' => 'CAS',
                'col_governor' => 'Stephen Garin',
                'college_logo' => 'CAS_logo.png',
                'col_description' => 'Graceful in color, grounded in truth—Verdant Parakeets glide with wisdom and youth. From roots of thought, their brilliance grows—where knowledge blooms, the spirit flows.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'college_name' => 'College of Business and Management',
                'college_code' => 'CBM',
                'col_governor' => 'Izzam M. Tanandato',
                'college_logo' => 'CBM_logo.png',
                'col_description' => 'Golden and grand with voices that lead—Canaries command with rhythm and speed. Sharp minds, bright fire, and flair to spare—this flock conquers with style and care.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'college_name' => 'College of Engineering and Technology',
                'college_code' => 'CET',
                'col_governor' => 'Jerson E. Plaza',
                'college_logo' => 'CET_logo.png',
                'col_description' => 'Crimson bold and power-defined—Toucans blaze with iron minds. Built for battle, forged in flame—this flock engineers its name in fame.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'college_name' => 'College of Information and Technology Education',
                'college_code' => 'CITE',
                'col_governor' => 'Joseph Feria',
                'college_logo' => 'CITE_logo.png',
                'col_description' => 'Elusive and wise with a digital glow—Woodnymphs weave wonders wherever they go. A mystic force in every code and key—this flock bends logic with artistry.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'college_name' => 'College of Teacher Education',
                'college_code' => 'CTE',
                'col_governor' => 'Client Jude C. Carballo',
                'college_logo' => 'CTE_logo.png',
                'col_description' => 'Bold in flight, fierce in might—Spix’s Macaws soar with hearts that ignite. Educated minds, unshakable will—this flock teaches the true meaning of thrill.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Use the 'intra' connection since the migration used Schema::connection('intra')
        DB::connection('intra')->table('intra_colleges')->insert($colleges);
    }
}
