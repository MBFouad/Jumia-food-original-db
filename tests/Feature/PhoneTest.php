<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PhoneTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('Morocco');
    }

    public function test_the_crud_returns_a_successful_response()
    {
        $response = $this->get('customer/list');

        $response->assertStatus(200);
        $response->assertJson([
            'data' => true,
            'recordsTotal' => true,
        ]);
        $response->assertSeeText('Morocco');
        $response->assertSeeText('6007989253');
    }
}
