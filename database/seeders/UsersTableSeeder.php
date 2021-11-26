<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        /** @var User $user */
        $user = User::factory()->create(['email' => 'voxie_test_user@gmail.com']);
        $user->givePermissionTo('read contacts', 'edit contacts', 'delete contacts');
    }
}
