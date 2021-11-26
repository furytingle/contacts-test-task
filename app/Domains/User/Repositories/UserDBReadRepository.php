<?php

declare(strict_types=1);

namespace App\Domains\User\Repositories;

use App\Domains\User\DTO\UserLoginDTO;
use App\Models\User;

class UserDBReadRepository implements UserReadRepositoryInterface
{
    public function findUser(UserLoginDTO $dto): ?User
    {
        /** @var User $user */
        $user = User::query()->where([
            'email' => $dto->email->getValue(),
        ])->first();

        return $user;
    }
}
