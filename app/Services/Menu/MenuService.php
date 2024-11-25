<?php

namespace App\Services\Menu;

use App\Dto\MenuDto;
use App\Models\Menu;
use App\Models\RoleHasMenu;
use App\Models\UserHasMenu;
use App\Dto\ResponseServiceDto;
use App\Models\MenuHasPermission;

class MenuService implements IMenuService
{
    public function save(MenuDto $dto): ResponseServiceDto
    {
        $menu = new Menu();
        $menu->name = $dto->name;
        $menu->link = !empty($dto->link) ? $dto->link : '#';
        $menu->link_alias = !empty($dto->linkAlias) ? $dto->linkAlias : '#';
        $menu->icon = !empty($dto->icon) ? $dto->icon : '#';
        $menu->parent = $dto->parent != '#' ? $dto->parent : 0;
        $menu->order = $dto->order;
        $result = $menu->save();

        // compose respose
        $detailMessage = 'menambahkan data';
        $message       = $result ? 'Berhasil ' : 'Gagal ';
        $message       = $message.$detailMessage;
        return new ResponseServiceDto($result, $message);
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

    public function all(bool $buildTree = false): array
    {
        $menus = Menu::orderBy('id', 'asc')->get();

        if ($buildTree) {
            return $this->buildTreeMenu($menus->toArray());
        } else {
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

    public function makeHTMLSiderbar(array $menus, array $segments): string
    {
        $tree = '';

        foreach ($menus as $item) {
            $isActive = implode('/', $segments) === $item['link'] ? 'bg-gray-200' : '';

            $icon = '';

            if ($item['icon'] != '#') {
                $icon = '<i class="'.$item['icon'].' ri-lg"></i>';
            }

            if ($item['children']) {
                $id = $item['id'].'-accordion';
                $tree .= '<li class="hs-accordion" id="'.$id.'">';
                $tree .= '<button type="button" class="hs-accordion-toggle '. $isActive .' hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent w-full text-start flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100" aria-expanded="true" aria-controls="'.$id.'">';
                $tree .= $icon;
                $tree .= $item['name'];
                $tree .= '<svg class="hs-accordion-active:block ms-auto hidden size-4 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>';
                $tree .= '<svg class="hs-accordion-active:hidden ms-auto block size-4 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>';
                $tree .= '</button>';
                $tree .= '<div id="'.$id.'" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden" role="region" aria-labelledby="'.$id.'">';
                $tree .= '<ul class="hs-accordion-group p-2 gap-2" data-hs-accordion-always-open>';
                $tree .= self::makeHTMLSiderbar($item['children'], $segments);
                $tree .= '</ul>';
            } else {
                $tree .= '<li class="my-2">';
                $tree .= '<a wire:navigate class="flex items-center gap-x-3.5 py-2 px-3 '. $isActive .' text-sm text-gray-700 rounded-lg hover:bg-gray-100" href="'.route($item['link_alias']).'">';
                $tree .= $icon;
                $tree .= $item['name'];
                $tree .= '</a>';
            }

           $tree .= '</li>';
        }
        return $tree;
    }

    public function makeHTMLMenu(array $menus): string
    {
        $tree = '';

        foreach ($menus as $item) {

            $id = $item['id'];

            // if ($item['children']) {
            //     $tree .= '<div class="hs-accordion active" role="treeitem" aria-expanded="true" id="'.$id.'-heading">';
            //     $tree .= '<div class="hs-accordion-heading py-0.5 flex items-center gap-x-0.5 w-full">
            //               <button class="hs-accordion-toggle size-6 flex justify-center items-center hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" aria-expanded="true" aria-controls="'.$id.'-collapse">
            //               <svg class="size-4 text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            //               <path d="M5 12h14"></path>
            //               <path class="hs-accordion-active:hidden block" d="M12 5v14"></path>
            //               </svg>
            //               </button>
            //               <div class="grow hs-accordion-selectable hs-accordion-selected:bg-gray-100 px-1.5 rounded-md cursor-pointer">
            //               <div class="flex items-center gap-x-3">
            //               <svg class="shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            //               <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"></path>
            //               </svg>
            //               <div class="grow">
            //               <span class="text-sm text-gray-800"> '.$item['id'].'. '.$item["name"].' </span>
            //               </div>
            //               </div>
            //               </div>
            //               </div>';
            //     $tree .= '<div id="'.$id.'-collapse" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" role="group" aria-labelledby="'.$id.'-heading">
            //               <div class="hs-accordion-group ps-7 relative before:absolute before:top-0 before:start-3 before:w-0.5 before:-ms-px before:h-full before:bg-gray-100" role="group" data-hs-accordion-always-open="true">';
            // } else {

            // }

            $tree .= '</div>';
        }
        return $tree;
    }
}
