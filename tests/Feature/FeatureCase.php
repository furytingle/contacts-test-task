<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class FeatureCase extends TestCase
{
    protected function createUser(): User
    {
        /** @var User $user */
        $user = User::factory()->create();
        $user->givePermissionTo('read contacts');

        return $user;
    }
}
