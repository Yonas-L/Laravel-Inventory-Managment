<?php

namespace Tests\Feature;

use Database\Factories\ProductFactory;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_product_can_be_created()
    {

        // creating the user
        $user = UserFactory::new()->create([
            'password' => bcrypt($password = '434344434344'),
            'role' => $role = 'admin'
        ]);
        // Try to log in
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => $password,
            'role' => $role
        ]);

        // Do the assertion
        $response->assertRedirectToRoute('home');
        $this->assertAuthenticatedAs($user);
        // create a product while logged in as a user
        $product = ProductFactory::new()->create();
        $response = $this->actingAs($user)->post('products', [$product]);
        $response->assertRedirectToRoute('home');
        $this->assertDatabaseHas('products', [
            'id' => $product->id
        ]);
        $this->assertDatabaseCount('products', 1);
    }

    public function test_a_product_can_be_updated()
    {

        // creating the user
        $user = UserFactory::new()->create([
            'password' => bcrypt($password = '434344434344'),
            'role' => $role = 'admin'
        ]);
        // Try to log in
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => $password,
            'role' => $role
        ]);

        // Do the assertion
        $response->assertRedirectToRoute('home');
        $this->assertAuthenticatedAs($user);


        // create a product while logged in as a user
        $product = ProductFactory::new()->create([
            'name' =>'sas'
        ]);
        $response1 = $this->actingAs($user)->post('products', [$product]);
        $response1->assertRedirectToRoute('home');
        $this->assertDatabaseHas('products', [
            'name' => $product->name
        ]);

        $this->afterRefreshingDatabase();
        $response2 = $this->actingAs($user)->put('product/update/2', [
            $product->name => 'yonni'
        ]);

        $response2->assertRedirectToRoute('home');

        $this->assertDatabaseHas('products', [
            'name' => 'yonni'
        ]);
        dd($product->name);
    }
}
