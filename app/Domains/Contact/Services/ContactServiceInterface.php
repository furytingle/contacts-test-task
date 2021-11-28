<?php

declare(strict_types=1);

namespace App\Domains\Contact\Services;

use App\Domains\Contact\DTO\CreateContactDTO;
use App\Domains\Contact\DTO\GetContactsDTO;
use App\Domains\Contact\DTO\UpdateContactDTO;
use App\Models\Contact;
use Illuminate\Pagination\LengthAwarePaginator;

interface ContactServiceInterface
{
    public function getContacts(GetContactsDTO $dto): LengthAwarePaginator;

    public function create(CreateContactDTO $dto): Contact;

    public function update(Contact $contact, UpdateContactDTO $dto): Contact;

    public function delete(Contact $contact): void;
}
