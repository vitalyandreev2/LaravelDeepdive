<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_status_success()
    {
        $response = $this->get(route('feedback'));
        $response->assertStatus(200);
    }

    public function test_store_status_success(): void
    {
        $data = [
            'name' => 'Some name',
            'comment' => 'Some text',
        ];
        $response = $this->post(route('feedback.store'), $data);
        $response->assertRedirect(route('feedback'));
    }

    public function test_index_cookie_missing()
    {
        $response = $this->get(route('feedback'));
        $response->assertCookieMissing('test-cookie');
    }
}
