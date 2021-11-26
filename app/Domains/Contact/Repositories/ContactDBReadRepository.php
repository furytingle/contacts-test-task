<?php

declare(strict_types=1);

namespace App\Domains\Contact\Repositories;

use App\Domains\Contact\DTO\GetContactsDTO;
use App\Models\Contact;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactDBReadRepository implements ContactReadRepositoryInterface
{
    public function getContacts(GetContactsDTO $dto): LengthAwarePaginator
    {
        return Contact::query()
            ->paginate(
                perPage: $dto->perPage->getValue(),
                page: $dto->page->getValue()
            );
    }
}
