<?php

declare(strict_types=1);

namespace App\Http\Actions\Contact\Update;

use App\Domains\Contact\DTO\UpdateContactDTO;
use App\Domains\Contact\Services\ContactService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Http\Resources\Contact\ContactResource;
use App\Models\Contact;

class UpdateContactAction extends Controller
{
    public function __construct(private ContactService $contactService)
    {
    }

    public function __invoke(Contact $contact, UpdateContactRequest $request): ContactResource
    {
        return new ContactResource($this->contactService->update($contact, UpdateContactDTO::fromRequest($request)));
    }
}
