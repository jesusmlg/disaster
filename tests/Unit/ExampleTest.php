<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\Models\Note;
use \App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Console\Command;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function setUp()
    {
        parent::setUp();
        \Artisan::call('migrate');
        \Artisan::call('db:seed', ['--database' => 'sqlite_testing']);
    }

    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testCreateNewNote()
    {
        $allUsersBefore = User::all()->count();

        $user = factory(\App\User::class)->create(['email' => "user6@user.com",
                'password' => bcrypt('secret'),
                'name' => 'MyTestUser']);

        $allUsersAfter= User::all()->count();

        $this->assertEquals($allUsersBefore+1 , $allUsersAfter);

        $note = new Note();

        $notesBefore = Note::all()->count();

        $note->title ="hola";
        $note->note = "que tal";
        $note->user_id = $user->id;

        $note->save();

        $this->assertEquals($notesBefore, Note::all()->count() -1 );



    }

    /**
     * @dataProvider tagSearchProvider
     */

    public function testSearchByTag($tag,$expected)
    {
        $this->actingAs(User::first());
        $notes = Note::searchByTag($tag)->count(); 
        $this->assertEquals($notes,$expected);

    }

    public function tagSearchProvider()
    {
        return [
            '2018 tres' => ['2018',3],
            'Mayo dos' => ['Mayo',2],
            'Ticket uno' => ['Ticket',1]
        ];
    }
    

}
