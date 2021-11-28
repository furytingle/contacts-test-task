<?php

declare(strict_types=1);

namespace App\Domains\Contact\Providers;

use App\Domains\Contact\Repositories\ContactDBReadRepository;
use App\Domains\Contact\Repositories\ContactDBWriteRepository;
use App\Domains\Contact\Repositories\ContactReadRepositoryInterface;
use App\Domains\Contact\Repositories\ContactWriteRepositoryInterface;
use App\Domains\Contact\Services\ContactService;
use App\Domains\Contact\Services\ContactServiceInterface;
use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ContactReadRepositoryInterface::class, ContactDBReadRepository::class);
        $this->app->bind(ContactWriteRepositoryInterface::class, ContactDBWriteRepository::class);
        $this->app->bind(ContactServiceInterface::class, ContactService::class);
    }
}
