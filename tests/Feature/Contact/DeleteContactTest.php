<?php

declare(strict_types=1);

namespace Tests\Feature\Contact;

use App\Mail\ContactDeleted;
use App\Models\Contact;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\Sanctum;
use Tests\Feature\FeatureCase;

class DeleteContactTest extends FeatureCase
{
    use DatabaseTransactions;

    public function testDeleteContact(): void
    {
        $user = $this->createUser();
        $user->givePermissionTo('delete contacts');

        Sanctum::actingAs($user);

        Mail::fake();

        $contact = Contact::factory()->create();

        $route = url()->route('contact.delete', ['contact' => $contact]);

        $response = $this->delete($route);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonFragment(['deleted' => true]);

        Mail::assertQueued(ContactDeleted::class);

        $response = $this->get($route);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function testDeleteContactNotFound(): void
    {
        $user = $this->createUser();
        $user->givePermissionTo('delete contacts');

        Sanctum::actingAs($user);

        $route = url()->route('contact.delete', ['contact' => 876]);

        $response = $this->delete($route);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
