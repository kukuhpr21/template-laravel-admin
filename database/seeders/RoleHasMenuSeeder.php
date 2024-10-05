<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\RoleHasMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleHasMenuSeeder extends Seeder
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
        $sessionManagement = Menu::where('name', 'Session Management')->first();
        $rolemenu = [
            [
                'role_id' => 'admin',
                'menu_id' => $dashboard->id
            ],
            [
                'role_id' => 'admin',
                'menu_id' => $sessionManagement->id
            ],
            [
                'role_id' => 'super_admin',
                'menu_id' => $dashboard->id
            ],
            [
                'role_id' => 'super_admin',
                'menu_id' => $role->id
            ],
            [
                'role_id' => 'super_admin',
                'menu_id' => $menu->id
            ],
            [
                'role_id' => 'super_admin',
                'menu_id' => $permission->id
            ],
            [
                'role_id' => 'super_admin',
                'menu_id' => $menuWithPermission->id
            ],
            [
                'role_id' => 'super_admin',
                'menu_id' => $roleWithMenu->id
            ],
            [
                'role_id' => 'super_admin',
                'menu_id' => $userWithRole->id
            ],
            [
                'role_id' => 'super_admin',
                'menu_id' => $userWithMenu->id
            ],
            [
                'role_id' => 'super_admin',
                'menu_id' => $sessionManagement->id
            ]
        ];
        RoleHasMenu::insert($rolemenu);
    }
}
