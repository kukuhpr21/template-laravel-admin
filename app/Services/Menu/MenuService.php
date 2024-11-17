<?php

namespace App\Services\Menu;

use App\Dto\MenuDto;
use App\Models\Menu;
use App\Models\RoleHasMenu;
use App\Models\UserHasMenu;
use App\Models\MenuHasPermission;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Database\Eloquent\Builder;

class MenuService implements IMenuService
{
    public function save(MenuDto $dto): bool
    {
        $menu = new Menu();
        $menu->name = $dto->name;
        $menu->link = !empty($dto->link) ? $dto->link : '#';
        $menu->link_alias = !empty($dto->linkAlias) ? $dto->linkAlias : '#';
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
            $menu->link_alias,
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
                        $menu->linkAlias,
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
        $menus = UserHasMenu::select('id', 'name', 'link', 'link_alias', 'icon', 'parent', 'order')
                ->where('user_id', $userID)
                ->leftJoin('menus', 'menus.id', '=', 'user_has_menus.menu_id')
                ->orderBy('order', 'asc')
                ->get()->toArray();

        return $buildTree ? $this->buildTreeMenu($menus) : $menus;
    }

    public function allParent(): array
    {
        return Menu::where('parent', 0)
            ->orWhereRaw('id = parent')
            ->orWhereRaw("link = '#'")
            ->orderBy('order', 'asc')
            ->get()->toArray();
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
        $menu->link_alias = $dto->linkAlias;
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

    private function buildTreeMenu(array $menus, int $parent = 0): array
    {
        $tree = [];

        foreach ($menus as $element) {

            if ($element['parent'] == $parent) {

                $children = self::buildTreeMenu($menus, $element['id']);

                $element['children'] = [];

                if ($children) {
                    $element['children'] = $children;
                }

                $tree[] = $element;
            }
        }

        return $tree;
    }
}
