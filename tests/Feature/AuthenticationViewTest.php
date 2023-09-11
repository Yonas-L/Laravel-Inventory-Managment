<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationViewTest extends TestCase
{

    public function test_login_form_renders_correctly(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
    public function test_registration_form_renders_correctly(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_the_login_form_has_correct_information(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('email');
        $response->assertSee('password');
        $response->assertSee('register');
    }
    public function test_the_registration_form_has_correct_information(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('email');
        $response->assertSee('branch');
        $response->assertSee('password');
    }
}
