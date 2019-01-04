<?php

use Illuminate\Database\Seeder;
use App\Team\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'Griffondor',
            'country' => 'Poudlar',
            'flag' => 'es.png',
            'numberPlayers' => 20,
            'numberMatchesWon' => 5,
            'numberGoals' => 46,
            'ranking' => 1,
            
        ]);
        Team::create([
            'name' => 'Serdaigle',
            'country' => 'Ploitru',
            'flag' => 'po.png',
            'numberPlayers' => 20,
            'numberMatchesWon' => 12,
            'numberGoals' => 567,
            'ranking' => 4,
            
        ]);
        Team::create([
            'name' => 'Sevissar',
            'country' => 'Bellevue',
            'flag' => 'fr.png',
            'numberPlayers' => 20,
            'numberMatchesWon' => 5,
            'numberGoals' => 30,
            'ranking' => 3,
            
        ]);
        Team::create([
            'name' => 'Serpentar',
            'country' => 'Darmstrang',
            'flag' => 'al.png',
            'numberPlayers' => 20,
            'numberMatchesWon' => 7,
            'numberGoals' => 78,
            'ranking' => 2,
        ]);
        Team::create([
            'name' => 'Poussoufle',
            'country' => 'Miraille',
            'flag' => 'gb.png',
            'numberPlayers' => 20,
            'numberMatchesWon' => 2,
            'numberGoals' => 34,
            'ranking' => 5,
        ]);
    }
}
