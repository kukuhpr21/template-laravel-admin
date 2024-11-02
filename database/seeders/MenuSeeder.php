<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'name' => 'Dashboard',
            'icon' => 'ri-home-6-line',
            'link' => 'dashboard',
            'parent' => 0,
            'order' => 1,
        ]);

        $menuSettings = Menu::create([
            'name' => 'Settings',
            'icon' => 'ri-tools-line',
            'parent' => 0,
            'order' => 100,
        ]);

        $subMenuSettings = [
            [
                'name' => 'Role',
                'link' => 'settings/roles',
                'parent' => $menuSettings->id,
                'order' => 1,
            ],
            [
                'name' => 'Menu',
                'link' => 'settings/menus',
                'parent' => $menuSettings->id,
                'order' => 2,
            ],
            [
                'name' => 'Permission',
                'link' => 'settings/permissions',
                'parent' => $menuSettings->id,
                'order' => 3,
            ],
        ];

        Menu::insert($subMenuSettings);

        $menumapping = Menu::create([
            'name' => 'Mapping',
            'parent' => $menuSettings->id,
            'order' => 4,
        ]);

        $subMenuMapping = [
            [
                'name' => 'Menu Permission',
                'link' => 'settings/mapping/menus-permissions',
                'parent' => $menumapping->id,
                'order' => 1,
            ],
            [
                'name' => 'Role Menu',
                'link' => 'settings/mapping/roles-menus',
                'parent' => $menumapping->id,
                'order' => 2,
            ],
            [
                'name' => 'User Role',
                'link' => 'settings/mapping/users-roles',
                'parent' => $menumapping->id,
                'order' => 3,
            ],
            [
                'name' => 'User Menu',
                'link' => 'settings/mapping/users-menus',
                'parent' => $menumapping->id,
                'order' => 4,
            ]
        ];

        Menu::insert($subMenuMapping);
    }
}
