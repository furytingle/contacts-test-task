<?php

declare(strict_types=1);

namespace App\Domains\Contact\Services;

use App\Domains\Contact\DTO\CreateContactDTO;
use App\Domains\Contact\DTO\GetContactsDTO;
use App\Domains\Contact\DTO\UpdateContactDTO;
use App\Domains\Contact\Repositories\ContactReadRepositoryInterface;
use App\Domains\Contact\Repositories\ContactWriteRepositoryInterface;
use App\Models\Contact;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactService
{
    public function __construct(
        protected ContactReadRepositoryInterface $readRepository,
        protected ContactWriteRepositoryInterface $writeRepository
    )
    {
    }

    public function getContacts(GetContactsDTO $dto): LengthAwarePaginator
    {
        return $this->readRepository->getContacts($dto);
    }

    public function create(CreateContactDTO $dto): Contact
    {
        return $this->writeRepository->create($dto);
    }

    public function update(Contact $contact, UpdateContactDTO $dto): Contact
    {
        return $this->writeRepository->update($contact, $dto);
    }

    public function delete(Contact $contact): void
    {
        $this->writeRepository->delete($contact);
    }
}
