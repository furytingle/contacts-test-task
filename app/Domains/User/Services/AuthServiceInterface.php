<?php

declare(strict_types=1);

namespace App\Domains\User\Services;

use App\Domains\User\DTO\UserLoginDTO;
use App\Models\User;

interface AuthServiceInterface
{
    public function findUser(UserLoginDTO $dto): ?User;
}
