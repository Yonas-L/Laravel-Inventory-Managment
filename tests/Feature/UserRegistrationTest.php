<?php

namespace Tests\Feature;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PharIo\Manifest\Email;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function test_users_can_register()
    {
        // creating the user
        $user = UserFactory::new()->create();
        $this->isAuthenticated();
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
        ]);
    }

    public function test_user_cannot_see_registration_form_if_authenticated()
    {
        $user = UserFactory::new()->create();
        $response = $this->actingAs($user)->get('register');
        $response->assertRedirectToRoute('home');
    }

    public function test_users_can_not_use_email_that_is_already_taken()
    {
        $existingUser = UserFactory::new()->create();

        $response = $this->post('/register', [
            'email' => $existingUser->email
        ]);

        $response->assertInvalid('email');
    }
    
}
