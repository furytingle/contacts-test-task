<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Tests\Feature\FeatureCase;

class LoginTest extends FeatureCase
{
    use DatabaseTransactions;

    public function testLogin(): void
    {
        $data = ['email' => 'my_new_test_email@gmail.com'];

        $this->createUser($data);

        $route = url()->route('auth.login');

        $response = $this->post($route, [
            'email' => $data['email'],
            'password' => 'password'
        ]);

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure(['data' => ['access_token']]);

        $response = $this->post($route, [
            'email' => $data['email'],
            'password' => 'invalid_password'
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
