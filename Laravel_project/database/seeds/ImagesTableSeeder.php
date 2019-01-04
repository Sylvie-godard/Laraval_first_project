<?php

use Illuminate\Database\Seeder;
use App\Image\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'user_id' => 1,
            'teams_id' => 1,
            'name' => 'France',
            'description' => 'Le Pays de la pseudo liberté',            
        ]);
        Image::create([
            'user_id' => 2,
            'teams_id' => 2,
            'name' => 'Algérie',
            'description' => 'Viva l\'Algérie',   
        ]);
        Image::create([
            'user_id' => 3,
            'teams_id' => 3,
            'name' => 'Espagne',
            'description' => 'Y Los Churros',   
        ]);
    }
}
