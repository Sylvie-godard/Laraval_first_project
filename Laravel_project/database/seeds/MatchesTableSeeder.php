<?php

use Illuminate\Database\Seeder;
use App\Match\Match;

class MatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run(){
        Match::create([
            'scoreBoard' => "10-500",
            'teams1_id' => '1',
            'teams2_id' => '2',
            'placement' => 'Poudlard',
            'temperature' => '25',
            'nb_faults' => '5',
        ]);

        Match::create([
            'scoreBoard' => "178-540",
            'teams1_id' => '1',
            'teams2_id' => '4',
            'placement' => 'Miraille',
            'temperature' => '25',
            'nb_faults' => '5',
        ]);

        Match::create([
            'scoreBoard' => "200-100",
            'teams1_id' => '1',
            'teams2_id' => '3',
            'placement' => 'Darmstrang',           
            'temperature' => '25',
            'nb_faults' => '5',
        ]);

        Match::create([
            'scoreBoard' => "210-200",
            'winner_id' => '2',
            'teams1_id' => '2',
            'teams2_id' => '3',
            'placement' => 'Bellevue',
            'temperature' => '25',
            'nb_faults' => '5',
        ]);
    
    }
}
