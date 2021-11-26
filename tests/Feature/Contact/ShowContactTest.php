<?php

declare(strict_types=1);

namespace Tests\Feature\Contact;

use App\Models\Contact;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\Feature\FeatureCase;

class ShowContactTest extends FeatureCase
{
    use DatabaseTransactions;
    use WithFaker;

    public function testShowContact(): void
    {
        $user = $this->makeUser();
        Sanctum::actingAs($user);

        /** @var Contact $contact */
        $contact = Contact::factory()->create();

        $route = url()->route('contact.show', ['contact' => $contact]);

        $response = $this->get($route);

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJsonFragment([
            'name' => $contact->name
        ]);
    }

    public function testShowContactNotFound(): void
    {
        $user = $this->makeUser();
        Sanctum::actingAs($user);

        $route = url()->route('contact.show', ['contact' => 'c1']);

        $response = $this->get($route);

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
