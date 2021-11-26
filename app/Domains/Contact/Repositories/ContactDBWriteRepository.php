<?php

declare(strict_types=1);

namespace App\Domains\Contact\Repositories;

use App\Domains\Contact\DTO\CreateContactDTO;
use App\Domains\Contact\DTO\UpdateContactDTO;
use App\Models\Contact;

class ContactDBWriteRepository implements ContactWriteRepositoryInterface
{
    public function create(CreateContactDTO $dto): Contact
    {
        return Contact::create($dto->toArray());
    }

    public function update(Contact $contact, UpdateContactDTO $dto): Contact
    {
        $data = array_filter($dto->toArray());
        $contact->update($data);

        return $contact;
    }

    public function delete(Contact $contact): void
    {
        $contact->delete();
    }
}
