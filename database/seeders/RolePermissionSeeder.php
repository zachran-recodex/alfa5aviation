<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage settings',
            'manage hero sections',
            'manage partners',
            'manage abouts',
            'manage services',
            'manage fleets',
            'manage contacts',
            'manage blogs',
            'manage page setups'
        ];

        foreach($permissions as $permission){
            Permission::firstOrCreate(
                [
                    'name' => $permission
                ]
            );
        }

        $designerRole = Role::firstOrCreate([
            'name' => 'designer'
        ]);

        $designManagerPermissions = [
            'manage fleets',
            'manage services'
        ];

        $designerRole->syncPermissions($designManagerPermissions);

        $adminRole = Role::firstOrCreate([
            'name' => 'admin'
        ]);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@alfa5aviation.com',
            'password' => bcrypt('admin123')
        ]);

        $user->assignRole($adminRole);
    }
}
