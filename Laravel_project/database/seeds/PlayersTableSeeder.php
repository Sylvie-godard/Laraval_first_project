<?php

use Illuminate\Database\Seeder;
use App\Player\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Player::create([
            'firstname' => "Harry",
            'Lastname' => 'Potter',
            'goals' => 30,            
            'height' => 1.67,            
            'age' => 25,            
            'birthdate' => "1993-10-11",            
            'weight' => 65.4,            
            'position' => "Attrapeur",            
            'teams_id' => 1,            
        ]);
        Player::create([
            'firstname' => "Dumbledore",
            'Lastname' => 'Sevrus',
            'goals' => 134,            
            'height' => 1.77,            
            'age' => 65,            
            'birthdate' => "1953-9-11",         
            'weight' => 76.4,            
            'position' => "Fonceur",            
            'teams_id' => 2,  
        ]);
        Player::create([
            'firstname' => "Drago",
            'Lastname' => 'Malfoy',
            'goals' => 23,            
            'height' => 1.69,            
            'age' => 26,            
            'birthdate' => "1992-8-9",            
            'weight' => 61.4,            
            'position' => "Défonseur",            
            'teams_id' => 3,   
        ]);
    }
}



