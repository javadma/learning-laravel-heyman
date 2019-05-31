<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        Log::shouldReceive('info')
            ->once()
            ->with('some one want to sneak in');
        $response = $this->get('/admin/panel');

        $response->assertRedirect('/welcome');
    }

    public function testAuthenticateUserPanel()
    {
        Log::shouldReceive('info')
            ->once()
            ->with('some one want to sneak in');
        $response = $this->get('/admin/panel');

        $response->assertRedirect('/welcome');
    }

    public function _testAuthenticateUserPanel()
    {
        $response = $this->get('/user/panel');
        $response->assertExactJson([
            'msg' => 'what do you do here'
        ]);
        $response->assertStatus(404);
    }
}
