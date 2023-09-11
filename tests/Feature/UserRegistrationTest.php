<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
   
    public function test_user_can_register_normally()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
