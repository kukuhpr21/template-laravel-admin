<?php

namespace App\Livewire\Main\Menus;

use App\Dto\KeyValDto;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\CreateMenuForm;
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
        $result = $this->form->submit();

        $icon = $result->status ? 'success' : 'error';

        if ($result->status) {
            $this->reset();

            session()->flash('notif', [
                'icon' => $icon,
                'message' => $result->message
            ]);

            return redirect()->route('menus');
        } else {
            $this->dispatch('sweet-alert-notif', icon: $icon, title: $result->message);
        }
    }

    #[On('valueParentUpdated')]
    public function parentSelected($value)
    {
        $this->form->parent = $value;
    }

    public function render()
    {
        $parents  = array();
        $allParent = $this->menuService->allParent();

        array_push($parents, new KeyValDto('#', 'Default Parent'));

        foreach ($allParent as $item) {
            array_push($parents, new KeyValDto($item['id'], $item['name']));
        }

        // tree menu
        $menus = $this->menuService->all(true);
        $menus = $this->menuService->makeHTMLMenu($menus);
        return view('livewire.main.menus.create', compact('parents', 'menus'));
    }
}
