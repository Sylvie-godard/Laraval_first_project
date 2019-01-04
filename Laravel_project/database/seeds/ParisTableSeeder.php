<?php

use Illuminate\Database\Seeder;
use App\Pari\Pari;


class ParisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pari::create([
            'users_id' => 2,
            'teams_id' => 4,
            'amount' => 20,
            'matches_id' => 2,
        ]);

        Pari::create([
            'users_id' => 1,
            'teams_id' => 1,
            'amount' => 200,
            'matches_id' => 1,

        ]);
    }
}
