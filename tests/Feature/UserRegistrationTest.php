<?php

namespace Tests\Feature;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function test_user_can_register()
    {
        // creating the user
       $user= UserFactory::new()->create();
        $response = $this->post('register',[$user]);
        $response->assertRedirectToRoute('home');
    }

    public function test_user_cannot_see_registration_form_if_authenticated()
    {
        $user = UserFactory::new()->create();
        $response = $this->actingAs($user)->get('register');
        $response->assertRedirectToRoute('home');
    }
}
