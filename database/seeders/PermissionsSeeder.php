<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Users
            'users.index',
            'users.create',
            'users.edit',
            'users.destroy',
            'users.restore',
            'users.force-delete',
            // Roles
            'roles.index',
            'roles.create',
            'roles.edit',
            'roles.destroy',
            // Permissions
            'permissions.index',
            'permissions.edit'
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'name' => $permission
            ]);
        }
    }
}
