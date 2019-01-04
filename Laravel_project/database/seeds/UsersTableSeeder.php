<?php
use Illuminate\Database\Seeder;
use App\User\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Durand',
            'email' => 'durand@chezlui.fr',
            'role' => 'admin',
            'password' => bcrypt('admin'),
            'email_verified_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'sylvie',
            'email' => 'sylvie@sylvie.fr',
            'role' => 'admin',
            'password' => bcrypt('sylvie'),
            'email_verified_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Dupont',
            'email' => 'dupont@chezlui.fr',
            'password' => bcrypt('user'),
            'email_verified_at' => Carbon::now(),
        ]);
        
        User::create([
            'name' => 'Martin',
            'email' => 'martin@chezlui.fr',
            'password' => bcrypt('user'),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}

?>