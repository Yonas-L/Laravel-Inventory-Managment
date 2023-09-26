<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase, WithFaker;



    public function test_user_can_login_only_using_email_and_password()
    {
        // creating the user
        $user = UserFactory::new()->create([
            'password' => bcrypt($password = '434344434344'),
        ]);
        // Try to log in
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        // Do the assertion
        $response->assertRedirectToRoute('home');
        $this->assertAuthenticatedAs($user);
    }


    public function test_user_cannot_see_login_form_if_authenticated()
    {
        $user = UserFactory::new()->create();
        $response = $this->actingAs($user)->get('login');
        $response->assertRedirectToRoute('home');
    }
    public function test_user_cannot_see_dashboard_if_not_logged_in()
    {
        $response = $this->get('/');
        $response->assertRedirect('login');
    }
    public function test_remember_me_checkbox_works()
    {
        $user = UserFactory::new()->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
            'remember' => 'on',
        ]);

        $response->assertRedirectToRoute('home');
        $this->assertAuthenticatedAs($user);


        // cookie assertion goes here
        $response->assertCookie(Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
            $user->id,
            $user->getRememberToken(),
            $user->password,
        ]));
    }



    // Test for validation
    public function test_users_can_not_login_with_wrong_credential()
    {
        // Create a user in the database
        $user = User::factory()->create();

        // Attempt to login with wrong credentials
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password'
        ]);

        // Assert that the user is not authenticated
        $this->assertGuest();

        // Assert that the response is redirected back to the login page
        $response->assertRedirect('/login');

        // Assert that the session has errors
        $response->assertSessionHasErrors('email');

        // Assert that the error message is displayed
        $this->followRedirects($response)->assertSee('These credentials do not match our records.');
    }
}
