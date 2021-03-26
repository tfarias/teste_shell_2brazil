<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class requestTest extends TestCase
{
    /**
    @test
     */
    public function request_server_is_valid()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
