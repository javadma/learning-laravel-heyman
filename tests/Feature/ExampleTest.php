<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/admin/panel');

        $response->assertRedirect('/welcome');
    }

    public function testAuthenticateUserPanel()
    {
        $response = $this->get('/user/panel');
        $response->assertExactJson([
            'msg' => 'what do you do here'
        ]);
        $response->assertStatus(404);
    }
}
