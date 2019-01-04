<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(PlayersTableSeeder::class);
        $this->call(MatchesTableSeeder::class);
        $this->call(ParisTableSeeder::class);
    }
}
