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

        $user = User::factory()->create();
        $user->assignRole(Role::find(1)->name);

        // Adding permissions via a role
        //$user->assignRole('writer');

        $user1 = User::factory()->create();
        $user1->assignRole(Role::find(2)->name);
        $permissions = $user1->getPermissionsViaRoles();
        echo $permissions;
    }
}
