<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Services\Session\SessionService;

class Sidebar extends Component
{
    private SessionService $sessionService;

    public function render()
    {
        $this->sessionService = new SessionService();

        $menus = $this->sessionService->get('menus');

        $menusDecode = json_decode($menus, true);

        $data = [
            'menus' => $this->makeTreeSidebar($menusDecode)
        ];

        return view('livewire.partials.sidebar', $data);
    }

    private function makeTreeSidebar($menus)
    {
        $tree = '';

        foreach ($menus as $item) {
            $isActive = implode('/', request()->segments()) === $item['link'] ? 'bg-gray-200' : '';

            $icon = '';

            if ($item['icon'] != '#') {
                $icon = '<i class="'.$item['icon'].' ri-lg"></i>';
            }

            if ($item['children']) {
                $id = $item['id'].'accordion';
                $tree .= '<li class="hs-accordion" id="'.$id.'">';
                $tree .= '<button type="button" class="hs-accordion-toggle '. $isActive .' hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100" aria-expanded="true" aria-controls="'.$id.'">';
                $tree .= $icon;
                $tree .= $item['name'];
                $tree .= '<svg class="hs-accordion-active:block ms-auto hidden size-4 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>';
                $tree .= '<svg class="hs-accordion-active:hidden ms-auto block size-4 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>';
                $tree .= '</button>';
                $tree .= '<div id="'.$id.'" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden" role="region" aria-labelledby="'.$id.'">';
                $tree .= '<ul class="hs-accordion-group ps-3 pt-2" data-hs-accordion-always-open>';
                $tree .= self::makeTreeSidebar($item['children']);
                $tree .= '</ul>';
            } else {
                $tree .= '<li>';
                $tree .= '<a class="flex items-center gap-x-3.5 py-2 px-2.5 '. $isActive .' text-sm text-gray-700 rounded-lg hover:bg-gray-100" href="'.$item['link'].'">';
                $tree .= $icon;
                $tree .= $item['name'];
                $tree .= '</a>';
            }

           $tree .= '</li>';
        }
        return $tree;
    }
}
