<?php

declare(strict_types=1);

namespace App\Http\Actions\Contact\GetContacts;

use App\Domains\Contact\DTO\GetContactsDTO;
use App\Domains\Contact\Services\ContactService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\GetContactsRequest;
use App\Http\Resources\Contact\ContactResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetContactsAction extends Controller
{
    public function __construct(private ContactService $contactService)
    {
    }

    public function __invoke(GetContactsRequest $request): AnonymousResourceCollection
    {
        $contacts = $this->contactService->getContacts(GetContactsDTO::fromRequest($request));

        return ContactResource::collection($contacts);
    }
}