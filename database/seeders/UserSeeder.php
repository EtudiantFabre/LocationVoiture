<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $first_user = User::factory()->create();
        $first_user->assignRole(Role::find(1)->name);

        $second_user = User::factory()->create();
        $second_user->assignRole(Role::find(2)->name);

        $permissions = $second_user->getPermissionsViaRoles();
    }
}
