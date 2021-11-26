<?php

declare(strict_types=1);

namespace App\Domains\User\Services;

use App\Domains\User\DTO\UserLoginDTO;
use App\Domains\User\Exceptions\LoginException;
use App\Domains\User\Repositories\UserReadRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    public function __construct(protected UserReadRepositoryInterface $readRepository)
    {
    }

    public function findUser(UserLoginDTO $dto): ?User
    {
        $user = $this->readRepository->findUser($dto);

        if (!Hash::check($dto->password->getValue(), $user->password)) {
            throw new LoginException();
        }

        return $user;
    }
}
