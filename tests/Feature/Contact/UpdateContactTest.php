<?php

declare(strict_types=1);

namespace Tests\Feature\Contact;

use App\Models\Contact;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\Feature\FeatureCase;

class UpdateContactTest extends FeatureCase
{
    use DatabaseTransactions;

    public function testUpdateContact(): void
    {
        $user = $this->createUser();
        $user->givePermissionTo('edit contacts');

        Sanctum::actingAs($user);

        $contact = Contact::factory()->create();

        $route = url()->route('contact.update', ['contact' => $contact]);

        $data = [
            'name' => 'newName',
            'email' => 'new_test_email@gmail.com'
        ];
        $response = $this->put($route, $data);

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJsonFragment([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }

    public function testUpdateContactInvalid(): void
    {
        $user = $this->createUser();
        $user->givePermissionTo('edit contacts');

        Sanctum::actingAs($user);

        $contact = Contact::factory()->create();

        $route = url()->route('contact.update', ['contact' => $contact]);

        $data = [
            'name' => '',
        ];
        $response = $this->put($route, $data);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $response->assertJsonStructure(['errors' => ['name']]);
    }
}
