<?php

namespace App\Livewire\Partials;

use App\Services\Menu\MenuService;
use Livewire\Component;
use App\Services\Session\SessionService;

class Sidebar extends Component
{
    private SessionService $sessionService;
    private MenuService $menuService;

    public function render()
    {
        $this->sessionService = new SessionService();
        $this->menuService = new MenuService();

        $menus = $this->sessionService->get('menus');

        $menusDecode = json_decode($menus, true);

        $data = [
            'menus' => $this->menuService->makeHTMLSiderbar($menusDecode, request()->segments())
        ];

        return view('livewire.partials.sidebar', $data);
    }
}
