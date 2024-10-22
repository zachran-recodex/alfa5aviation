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
            'manage hero_sections',
            'manage partners',
            'manage abouts',
            'manage services',
            'manage fleets',
            'manage contacts',
            'manage blogs',
            'manage page_setups'
        ];

        foreach($permissions as $permission){
            Permission::firstOrCreate(
                [
                    'name' => $permission
                ]
            );
        }

        $designManagerRole = Role::firstOrCreate([
            'name' => 'designer_manager'
        ]);

        $designManagerPermissions = [
            'manage fleets',
            'manage services'
        ];

        $designManagerRole->syncPermissions($designManagerPermissions);

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@alfa5aviation.com',
            'password' => bcrypt('admin123')
        ]);

        $user->assignRole($superAdminRole);
    }
}
