<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CRUDNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->browse(function(Browser $browser){
            $user = factory(\App\User::class)->create(['email' => "user6@user.com",
                'password' => bcrypt('secret'),
                'name' => 'MyTestUser']);
            $browser->loginAs($user);

        });
    }

    public function testCreateUpdateDeleteNote()
    {

        $this->browse(function(Browser $browser){
           $browser->visit(route('note_new'))
                    ->assertSee('New Note')
                    ->type('@note-title', '')
                    ->press('@note-save')
                    ->assertDontSee('Edit Task')
                    ->type('@note-title', 'Mi title')
                    ->type('.note-editable', 'HOLA HOLA')
                    ->press('@note-save')
                    ->assertSee('Edit Note')
                    ->assertValue('@note-title','Mi title')
                    ->assertValue('@note-text','HOLA')
                    ->type('@note-title', 'Mi title changed')
                    ->type('.note-editable', 'ADIOS ADIOS')
                    ->press('@note-save')
                    ->assertValue('@note-title','Mi title changed')
                    ->assertValue('@note-text','ADIOS')
                    ->press('@note-delete')
                    ->acceptDialog()
                    ->assertSee('Total Files: 0');



        });
    }
}
