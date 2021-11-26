<?php

declare(strict_types=1);

namespace Tests\Feature\Contact;

use App\Models\Contact;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\Feature\FeatureCase;

class GetContactsTest extends FeatureCase
{
    use DatabaseTransactions;

    public function testGetContacts(): void
    {
        $user = $this->createUser();
        Sanctum::actingAs($user);

        Contact::factory()->count(25)->create();

        $route = url()->route('contact.getContacts');

        $response = $this->get($route);

        $response->assertStatus(Response::HTTP_OK);

        // 10 is the default per page number
        $response->assertJsonCount(10, 'data');

        $route = url()->route('contact.getContacts', ['per_page' => 15]);
        $response = $this->get($route);
        $response->assertJsonCount(15, 'data');

        $route = url()->route('contact.getContacts', ['page' => 2, 'per_page' => 5]);
        $response = $this->get($route);
        $response->assertJsonCount(5, 'data');

        $route = url()->route('contact.getContacts', ['page' => 10, 'per_page' => 5]);
        $response = $this->get($route);
        $response->assertJsonCount(0, 'data');
    }
}
