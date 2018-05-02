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
        
        array_map('unlink', glob(public_path('storage/files/seed/*')));

        DB::table('users')->insert([
            'name' => 'Antonio José',
            'email' => 'blablau@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'Maria del Carmen Blanes',
            'email' => 'bleble@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        // for($i=0;$i<20;$i++)
        // {
            $note = factory(\App\Models\Note::class)->create();
            
            // for($j=0;$j<3;$i++)
            // {
            //     $note->tags()->save(factory(\App\Models\Tag::class)->create());
            // }
            $note->tags()->save(factory(\App\Models\Tag::class)->create(['name'=>'Factura']));
            $note->tags()->save(factory(\App\Models\Tag::class)->create(['name'=>'Abril']));
            $note->tags()->save(factory(\App\Models\Tag::class)->create(['name'=>'2018']));
            $note->users()->save(\App\User::first());

            $note = factory(\App\Models\Note::class)->create();
            $note->tags()->save(factory(\App\Models\Tag::class)->create(['name'=>'Factura']));
            $note->tags()->save(factory(\App\Models\Tag::class)->create(['name'=>'Mayo']));
            $note->tags()->save(factory(\App\Models\Tag::class)->create(['name'=>'2018']));
            $note->users()->save(\App\User::first());

            $note = factory(\App\Models\Note::class)->create();
            $note->tags()->save(factory(\App\Models\Tag::class)->create(['name'=>'Ticket']));
            $note->tags()->save(factory(\App\Models\Tag::class)->create(['name'=>'Mayo']));
            $note->tags()->save(factory(\App\Models\Tag::class)->create(['name'=>'2018']));
            $note->users()->save(\App\User::first());

        // }
        
        // factory(\App\Models\Note::class,50)->create();
        // factory(\App\Models\Tag::class,100)->create();

        // $noteids = \App\Models\Note::pluck('id')->all();
        // $tagids = \App\Models\Tag::pluck('id')->all();
        // $userids = \App\User::pluck('id')->all();

        // for ($i=0; $i < 100 ; $i++) { 
        //     $note_id = $faker->randomElement($noteids);
        //     $tag_id = $faker->randomElement($tagids);
        //     $user_id = $faker->randomElement($tagids);

        //     $data = DB::table('notes_tags')->where('note_id', '=' ,$note_id)->where('tag_id','=' ,$tag_id)->first();
            
        //     if($data == null)
        //     {
        //         DB::table('notes_tags')->insert([
        //             'note_id' => $note_id,
        //             'tag_id' => $tag_id
        //         ]);    
        //     }            
            
        // }

        // for ($i=0; $i < 20; $i++) {             
        //     //$note_id = $faker->randomElement($noteids);            
        //     $note = DB::table('notes')->where('id', '=', $faker->randomElement($noteids))->first();            
        //     $path = "storage/files/seed/";
        //     if(!file_exists(public_path($path)))
        //         mkdir(public_path($path),0777,true);

        //     $file = $faker->file(public_path('test'),public_path($path),false);

        //     $file_id = DB::table('files')->insertGetId(['url' => $path.$file]);

        //     DB::table('notes_files')->insert([
        //         'note_id' => $note->id,
        //         'file_id' => $file_id
        //     ]);            
        // }
    }
}
