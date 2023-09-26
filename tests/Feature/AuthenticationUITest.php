<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationUITest extends TestCase
{

    public function test_login_form_renders_correctly(): void
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
    }
    public function test_registration_form_renders_correctly(): void
    {
        $response = $this->get('/register');
        $response->assertSuccessful();
    }

    public function test_the_login_form_has_correct_information(): void
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertSee('email');
        $response->assertSee('password');
        $response->assertSee('register');
        
    }
    public function test_the_registration_form_has_correct_information(): void
    {
        $response = $this->get('/register');
        $response->assertSuccessful();
        $response->assertSee('email');
        $response->assertSee('branch');
        $response->assertSee('password');
    }

    public function test_forgot_password_view_works(){
        $response=$this->get('forgot-password');
        $response->assertSuccessful();
        $response->assertSee('email');
        $this->assertGuest();
    }
}
