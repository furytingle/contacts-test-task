<?php

declare(strict_types=1);

namespace App\Domains\Contact\Repositories;

use App\Domains\Contact\DTO\CreateContactDTO;
use App\Domains\Contact\DTO\UpdateContactDTO;
use App\Models\Contact;

interface ContactWriteRepositoryInterface
{
    public function create(CreateContactDTO $dto): Contact;

    public function update(Contact $contact, UpdateContactDTO $dto): Contact;

    public function delete(Contact $contact): void;
}
