<?php

declare(strict_types=1);

namespace Tests\Feature\Contact;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\Feature\FeatureCase;

class CreateContactTest extends FeatureCase
{
    use DatabaseTransactions;
    use WithFaker;

    public function testCreateContact(): void
    {
        $user = $this->makeUser();
        $user->givePermissionTo('edit contacts');

        Sanctum::actingAs($user);

        $route = url()->route('contact.create');

        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email
        ];

        $response = $this->post($route, $data);

        $response->assertStatus(Response::HTTP_CREATED);

        $response->assertJsonFragment([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }

    public function testCreateContactInvalid(): void
    {
        $user = $this->makeUser();
        $user->givePermissionTo('edit contacts');

        Sanctum::actingAs($user);

        $route = url()->route('contact.create');

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->post($route, $data);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $response->assertJsonStructure(['errors' => ['email']]);
    }
}
