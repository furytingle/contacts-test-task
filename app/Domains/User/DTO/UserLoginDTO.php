<?php

declare(strict_types=1);

namespace App\Domains\User\DTO;

use App\Domains\User\ValueObjects\Email;
use App\Domains\User\ValueObjects\HashedPassword;
use App\Http\Requests\Login\LoginRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UserLoginDTO extends DataTransferObject
{
    public Email $email;

    public HashedPassword $password;

    public static function fromRequest(LoginRequest $request): self
    {
        return new self([
            'email' => new Email($request->email),
            'password' => new HashedPassword($request->password)
        ]);
    }
}
