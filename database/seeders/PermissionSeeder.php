<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = array(
            "user_create",
            "user_update",
            "user_delete",
            "user_show",
            "user_index"
        );


        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }
}
