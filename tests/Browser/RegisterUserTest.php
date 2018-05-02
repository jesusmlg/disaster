<?php

namespace tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class RegisterUserTest extends DuskTestCase
{
    use DatabaseMigrations;
       

    public function testRegisterUserRedirectToHome()
    {
        $this->browse(function (Browser $browser){              

            $browser->visit('/register')
                    ->type('name', 'usertest')
                    ->type('email', 'usertest@usertest.com')
                    ->type('password','123456')
                    ->type('password_confirmation','123456')
                    ->press('Register')
                    ->assertPathIs('/home')
                    ->assertSee('usertest')
                    ->assertSee('Total Files: 0')
                    ->clickLink('Logout')
                    ->assertSee('Login');

        });
    }    

    
}