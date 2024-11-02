<?php

namespace App\Services\Menu;

use App\Dto\MenuDto;
use App\Models\Menu;
use App\Models\RoleHasMenu;
use App\Models\MenuHasPermission;
use App\Models\UserHasMenu;
use Illuminate\Database\Eloquent\Collection;

class MenuService implements IMenuService
{
    public function save(MenuDto $dto): bool
    {
        $menu = new Menu();
        $menu->name = $dto->name;
        $menu->link = !empty($dto->link) ? $dto->link : '#';
        $menu->icon = !empty($dto->icon) ? $dto->icon : '#';
        $menu->parent = $dto->parent;
        $menu->order = $dto->order;
        return $menu->save();
    }

    public function get(string $id): MenuDto
    {
        $menu = Menu::where('id', $id)->first();
        return new MenuDto(
            $menu->id,
            $menu->name,
            $menu->link,
            $menu->icon,
            $menu->parent,
            $menu->order
        );
    }

    public function all(): array
    {
        $menus = Menu::orderBy('id', 'asc')->all();
        $result = array();
        if ($menus) {
            foreach ($menus as $menu) {
                array_push(
                    $result,
                    new MenuDto(
                        $menu->id,
                        $menu->name,
                        $menu->link,
                        $menu->icon,
                        $menu->parent,
                        $menu->order
                    )
                );
            }
        }
        return $result;
    }

    public function allByUser(string $userID, bool $buildTree = true): array
    {
        $menus = UserHasMenu::where('user_id', $userID)->orderBy('menu_id', 'asc')->get();
        return $buildTree ? $this->buildTreeMenu($menus) : $menus;
    }

    public function delete(string $id): bool
    {
        if ($this->menuIsNotUsed($id)) {
            return Menu::where('id', $id)->delete();
        }
        return false;
    }

    public function update(MenuDto $dto): bool
    {
        $menu = new Menu();
        $menu = $menu->where('id', $dto->id)->first();
        $menu->name = $dto->name;
        $menu->link = $dto->link;
        $menu->icon = $dto->icon;
        $menu->parent = $dto->parent;
        $menu->order = $dto->order;
        return $menu->save();
    }
    private function menuIsNotUsed(string $menuID): bool
    {
        $menuHasPermission = MenuHasPermission::where('menu_id', $menuID)->first();
        $roleHasMenu = RoleHasMenu::where('menu_id', $menuID)->first();
        $userHasMenu = UserHasMenu::where('menu_id', $menuID)->first();
        return !$menuHasPermission && !$roleHasMenu && !$userHasMenu;
    }

    private function buildTreeMenu(Collection $menus, int $parent = 0): array
    {
        $tree = [];

        foreach ($menus as $element) {
            if ($element) {
                if ($element->parent == $parent) {
                    $children = self::buildTreeMenu($menus, $element->id);
                    if ($children) {
                        $element->children = $children;
                    }
                    $tree[] = $element;
                }
            }
        }

        return $tree;
    }
}
