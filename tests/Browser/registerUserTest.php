<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class registerUserTest extends DuskTestCase
{
    use DatabaseMigrations;
       

    public function testRegisterUserRedirectToHome()
    {
        $this->browse(function (Browser $browser){              

            $browser->visit('/register')
                    ->type('name', 'usertest')
                    ->type('email', 'usertest@usertest.com')
                    ->type('password','123456')
                    ->type('password-confirm','123456')
                    ->press('Register')
                    ->assertPathIs('/home')
                    ->assertSee('usertest');

        });
    }

    
}