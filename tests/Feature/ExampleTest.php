<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    public function testIndexNotes()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get("/");
        $response->assertStatus(200);
        $response->assertSee('logout');
    }

    public function testRedirectWhenNoLogin()
    {
        $response = $this->get('/');
        $response->assertRedirect(route('login'));
        $response->assertNotSee('logout');

    }
}
