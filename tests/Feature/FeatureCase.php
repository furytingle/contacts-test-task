<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class FeatureCase extends TestCase
{
    protected function makeUser(): User
    {
        /** @var User $user */
        $user = User::factory()->make();
        $user->givePermissionTo('read contacts');

        return $user;
    }
}