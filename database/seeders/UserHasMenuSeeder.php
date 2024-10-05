<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\User;
use App\Models\UserHasMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserHasMenuSeeder extends Seeder
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
        $userSuperAdmin = User::where('username', 'usersuadmin')->first();
        $userAdmin = User::where('username', 'useradmin')->first();
        $usermenu = [
            [
                'user_id' => $userAdmin->id,
                'menu_id' => $dashboard->id
            ],
            [
                'user_id' => $userAdmin->id,
                'menu_id' => $sessionManagement->id
            ],
            [
                'user_id' => $userSuperAdmin->id,
                'menu_id' => $dashboard->id
            ],
            [
                'user_id' => $userSuperAdmin->id,
                'menu_id' => $role->id
            ],
            [
                'user_id' => $userSuperAdmin->id,
                'menu_id' => $menu->id
            ],
            [
                'user_id' => $userSuperAdmin->id,
                'menu_id' => $permission->id
            ],
            [
                'user_id' => $userSuperAdmin->id,
                'menu_id' => $menuWithPermission->id
            ],
            [
                'user_id' => $userSuperAdmin->id,
                'menu_id' => $roleWithMenu->id
            ],
            [
                'user_id' => $userSuperAdmin->id,
                'menu_id' => $userWithRole->id
            ],
            [
                'user_id' => $userSuperAdmin->id,
                'menu_id' => $userWithMenu->id
            ],
            [
                'user_id' => $userSuperAdmin->id,
                'menu_id' => $sessionManagement->id
            ]
        ];
        UserHasMenu::insert($usermenu);
    }
}
