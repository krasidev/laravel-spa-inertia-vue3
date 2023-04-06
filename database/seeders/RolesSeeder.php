<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'readonly' => 1
            ], [
                'name' => 'client',
                'readonly' => 1,
                'permissions' => [
                    //
                ]
            ]
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate([
                'name' => $role['name']
            ], [
                'readonly' => $role['readonly']
            ])->syncPermissions($role['permissions'] ?? []);
        }
    }
}
