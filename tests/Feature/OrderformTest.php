<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderformTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_status_success()
    {
        $response = $this->get(route('orderform'));
        $response->assertStatus(200);
    }

    public function test_index_session_missing()
    {
        $response = $this->get(route('orderform'));
        $response->assertSessionMissing('test_session');
    }

    public function test_store_status_success(): void
    {
        $data = [
            'name' => 'Some title',
            'phone' => '345345345',
            'email' => 'test@gmail.com',
            'info' => 'test text',
        ];
        $response = $this->post(route('orderform.store'), $data);
        $response->assertJson($data);
    }

    public function test_store_status_post(): void
    {
        $response = $this->post(route('orderform.store'));
        $response->assertStatus(302);
    }

    public function test_store_post_count(): void
    {
        $data = [
            'name' => 'Some title',
            'phone' => '345345345',
            'email' => 'test@gmail.com',
            'info' => 'test text',
        ];
        $response = $this->post(route('orderform.store'), $data);
        $response->assertJsonCount(4);
    }

    public function test_store_post_valid(): void
    {
        $data = [
            'name' => 'Some title',
            'phone' => '345345345',
            'email' => 'test@gmail.com',
            'info' => 'test text',
        ];
        $response = $this->post(route('orderform.store'), $data);
        $response->assertValid();
    }

    public function test_store_post_invalid_email(): void
    {
        $data = [
            'name' => 'Some title',
            'phone' => '345345345s',
            'email' => 'testgmail.com',
            'info' => 'test text',
        ];
        $response = $this->post(route('orderform.store'), $data);
        $response->assertInvalid('email');
    }
}
