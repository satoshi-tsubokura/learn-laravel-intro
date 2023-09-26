<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testHello() {
        $this->assertTrue(true);

        $arr = [];
        $this->assertEmpty($arr);

        $msg = 'Hello';
        $this->assertEquals('Hello', $msg);

        $n = random_int(0, 100);
        $this->assertLessThanOrEqual(100, $n);
    }

    public function test_index_request() {
        $response = $this->get('/hello');
        $response->assertStatus(200);
    }

    public function test_hello_login_redirect() {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get('/hello/login');
        $response->assertStatus(302);
    }

    public function test_not_found() {
        $response = $this->get('/msg/1');
        $response->assertStatus(404);
    }
}
