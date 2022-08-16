<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{   
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_recipes()
    {
        $response = $this->get('/api/categories');

        $response->assertStatus(200);
    }

        /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_creating_new_user()
    {
        $response = $this->post('/api/register', [
            'name' => 'juan',
            'email' => 'juan@gmail.com',
            'password' => '123456',
            'password_confirmation' => '123456',
        ]);

        $response->assertStatus(201);
    }

            /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_user()
    {
        $response = $this->post('/api/login', [
            'email' => 'erick@gmail.com',
            'password' => '123456',
            'password_confirmation' => '123456',
        ]);

        $response->assertStatus(201);
    }
}
