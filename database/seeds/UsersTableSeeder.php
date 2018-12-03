<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

        	'name' => 'Salim regragui',
        	'email' => 'xslimax@gmail.com',
        	'password' => bcrypt('password')

        ]);
    }
}
