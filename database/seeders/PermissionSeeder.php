<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'id' => 'view_dashboard',
                'name' => 'View Dashboard',
            ],
            [
                'id' => 'view_role',
                'name' => 'View Role',
            ],
            [
                'id' => 'create_role',
                'name' => 'Create Role',
            ],
            [
                'id' => 'update_role',
                'name' => 'Update Role',
            ],
            [
                'id' => 'delete_role',
                'name' => 'Delete Role',
            ],
            [
                'id' => 'view_menu',
                'name' => 'View Menu',
            ],
            [
                'id' => 'create_menu',
                'name' => 'Create menu',
            ],
            [
                'id' => 'update_menu',
                'name' => 'Update Menu',
            ],
            [
                'id' => 'delete_menu',
                'name' => 'Delete Menu',
            ],
            [
                'id' => 'view_permission',
                'name' => 'View Permission',
            ],
            [
                'id' => 'create_permission',
                'name' => 'Create menu',
            ],
            [
                'id' => 'update_permission',
                'name' => 'Update Permission',
            ],
            [
                'id' => 'delete_permission',
                'name' => 'Delete Permission',
            ],
            [
                'id' => 'mapping_menu_permission',
                'name' => 'Mapping Menu Permission',
            ],
            [
                'id' => 'mapping_role_menu',
                'name' => 'Mapping Role Menu',
            ],
            [
                'id' => 'mapping_user_role',
                'name' => 'Mapping User Role',
            ],
            [
                'id' => 'mapping_user_menu',
                'name' => 'Mapping User Menu',
            ],
            [
                'id' => 'view_session_management',
                'name' => 'View Session Management',
            ],
            [
                'id' => 'terminate_session_user',
                'name' => 'Terminate Session User',
            ],

        ];
        Permission::insert($permissions);
    }
}
