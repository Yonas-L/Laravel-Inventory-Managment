<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase, WithFaker;



    public function test_user_can_login_only_using_email_and_password()
    {
        // creating the user
       $user= UserFactory::new()->create();
        $response = $this->post('login',[$user]);
        $response->assertRedirectToRoute('home');
    }

    public function test_user_cannot_see_login_form_if_authenticated()
    {
        $user = UserFactory::new()->create();
        $response = $this->actingAs($user)->get('login');
        $response->assertRedirectToRoute('home');
    }
}
