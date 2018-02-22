<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();

        DB::table('users')->insert([
            'name' => 'Jesus María',
            'email' => 'inteclu@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        factory(\App\Models\Note::class,50)->create();
        factory(\App\Models\Tag::class,100)->create();

        $noteids = \App\Models\Note::pluck('id')->all();
        $tagids = \App\Models\Tag::pluck('id')->all();

        for ($i=0; $i < 100 ; $i++) { 
            DB::table('notes_tags')->insert([
                'note_id' => $faker->randomElement($noteids),
                'tag_id' => $faker->randomElement($tagids)
            ]);
        }
    }
}
