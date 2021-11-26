<?php

declare(strict_types=1);

namespace App\Http\Actions\Contact\Create;

use App\Domains\Contact\DTO\CreateContactDTO;
use App\Domains\Contact\Services\ContactService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\CreateContactRequest;
use App\Http\Resources\Contact\ContactResource;

final class CreateContactAction extends Controller
{
    public function __construct(private ContactService $contactService)
    {
    }

    public function __invoke(CreateContactRequest $request): ContactResource
    {
        $contact = $this->contactService->create(CreateContactDTO::fromRequest($request));

        return new ContactResource($contact);
    }
}
