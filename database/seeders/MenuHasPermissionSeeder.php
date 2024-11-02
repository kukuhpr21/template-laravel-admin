<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuHasPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dashboard = Menu::where('name', 'Dashboard')->first();
        $role = Menu::where('name', 'Role')->first();
        $menu = Menu::where('name', 'Menu')->first();
        $permission = Menu::where('name', 'Permission')->first();
        $menuWithPermission = Menu::where('name', 'Menu With Permission')->first();
        $roleWithMenu = Menu::where('name', 'Role With Menu')->first();
        $userWithRole = Menu::where('name', 'User With Role')->first();
        $userWithMenu = Menu::where('name', 'User With Menu')->first();
        $menuPermissions = [
            [
                'menu_id' => $dashboard->id,
                'permission_id' => 'view_dashboard',
            ],
            [
                'menu_id' => $role->id,
                'permission_id' => 'view_role',
            ],
            [
                'menu_id' => $menu->id,
                'permission_id' => 'view_menu',
            ],
            [
                'menu_id' => $permission->id,
                'permission_id' => 'view_permission',
            ],
            [
                'menu_id' => $menuWithPermission->id,
                'permission_id' => 'mapping_menu_permission',
            ],
            [
                'menu_id' => $roleWithMenu->id,
                'permission_id' => 'mapping_role_menu',
            ],
            [
                'menu_id' => $userWithRole->id,
                'permission_id' => 'mapping_user_role',
            ],
            [
                'menu_id' => $userWithMenu->id,
                'permission_id' => 'mapping_user_menu',
            ],
        ];

        MenuHasPermission::insert($menuPermissions);
    }
}
