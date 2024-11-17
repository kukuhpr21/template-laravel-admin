<?php

namespace App\Livewire\Main\Menus;

use App\Dto\KeyValDto;
use App\Livewire\Forms\CreateMenuForm;
use Livewire\Component;
use App\Services\Menu\MenuService;

class Create extends Component
{
    public CreateMenuForm $form;

    private MenuService $menuService;

    public function __construct() {
        $this->menuService = new MenuService();
    }

    public function submit()
    {
        $this->form->submit();
    }

    public function render()
    {
        $parents  = array();
        $allParent = $this->menuService->allParent();

        array_push($parents, new KeyValDto('#', 'Default Parent'));

        foreach ($allParent as $item) {
            array_push($parents, new KeyValDto($item['id'], $item['name']));
        }

        return view('livewire.main.menus.create', compact('parents'));
    }
}
