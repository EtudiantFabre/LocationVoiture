<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::find(1);
        $permissions = Permission::all();

        $admin->syncPermissions($permissions);

        $client = Role::find(2);

        $rollbak_permissions_client = [
            "user_create",
            "user_update",
            "user_delete",
        ];

        foreach ($permissions as $p) {
            if (!in_array($p, $rollbak_permissions_client)) {
                $client->syncPermissions($p);
            }
        }

    }
}
