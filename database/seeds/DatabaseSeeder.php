<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jesus María',
            'email' => 'inteclu@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        factory(\App\Models\Note::class,20)->create();
    }
}
