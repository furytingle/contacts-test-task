<?php

declare(strict_types=1);

namespace App\Domains\User\Providers;

use App\Domains\User\Repositories\UserDBReadRepository;
use App\Domains\User\Repositories\UserReadRepositoryInterface;
use App\Domains\User\Services\AuthService;
use App\Domains\User\Services\AuthServiceInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserReadRepositoryInterface::class, UserDBReadRepository::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }
}
