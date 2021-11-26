<?php

declare(strict_types=1);

namespace App\Domains\User\Repositories;

use App\Domains\User\DTO\UserLoginDTO;
use App\Models\User;

interface UserReadRepositoryInterface
{
    public function findUser(UserLoginDTO $dto): ?User;
}
