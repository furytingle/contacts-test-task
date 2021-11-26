<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'read contacts']);
        Permission::create(['name' => 'edit contacts']);
        Permission::create(['name' => 'delete contacts']);
    }
}
