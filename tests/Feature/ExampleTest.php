<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use App\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }



    public function testRedirectWhenNoLogin()
    {
        $response = $this->get('/');
        $response->assertRedirect(route('login'));
        $response->assertDontSee('logout');

    }


}
