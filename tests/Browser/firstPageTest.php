<?php

namespace Tests\Feature;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class FirstTestPageTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testNoLoggedGoToLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Login');
        });

    }

    public function testOKloginRedirectToNotes()
    {
        $this->browse(function (Browser $browser){
              $user = factory(\App\User::class)->create(['email' => "user6@user.com",
                                                         'password' => bcrypt('secret'),
                                                         'name' => 'MyTestUser']);

             $browser->visit('/login')
                     ->type('email',$user->email)
                     ->type('password','secret')
                     ->press('Login')
                     ->assertPathIs('/notes')
                     ->assertSee('MyTestUser')
                     ->clickLink('Logout');


        });
    }

    
}
