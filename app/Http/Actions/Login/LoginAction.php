<?php

declare(strict_types=1);

namespace App\Http\Actions\Login;

use App\Domains\User\DTO\UserLoginDTO;
use App\Domains\User\Services\AuthServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Http\Resources\PersonalTokenResource;

final class LoginAction extends Controller
{
    public function __construct(private AuthServiceInterface $authService)
    {
    }

    public function __invoke(LoginRequest $request): PersonalTokenResource
    {
        $user = $this->authService->findUser(UserLoginDTO::fromRequest($request));

        $token = $user->createToken('personal_access_token');

        return new PersonalTokenResource($token);
    }
}
