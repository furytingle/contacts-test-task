<?php

declare(strict_types=1);

namespace App\Domains\Contact\Repositories;

use App\Domains\Contact\DTO\GetContactsDTO;
use Illuminate\Pagination\LengthAwarePaginator;

interface ContactReadRepositoryInterface
{
    public function getContacts(GetContactsDTO $dto): LengthAwarePaginator;
}
