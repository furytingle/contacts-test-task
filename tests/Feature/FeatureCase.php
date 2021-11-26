<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class FeatureCase extends TestCase
{
    protected function createUser($attributes = []): User
    {
        /** @var User $user */
        $user = User::factory()->create($attributes);
        $user->givePermissionTo('read contacts');

        return $user;
    }
}
