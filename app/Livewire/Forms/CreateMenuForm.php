<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Dto\MenuDto;
use Livewire\Attributes\Validate;
use App\Services\Menu\MenuService;

class CreateMenuForm extends Form
{
    #[Validate(['required'])]
    public string $parent = "";

    #[Validate(['required'])]
    public string $name = "";

    #[Validate(['nullable|string'])]
    public string $link = "";

    #[Validate(['nullable|string'])]
    public string $link_alias = "";

    #[Validate(['nullable|string'])]
    public string $icon = "";

    #[Validate(['nullable|integer'])]
    public string $order = "";

    private MenuService $menuService;

    public function __construct() {
        $this->menuService = new MenuService();
    }

    public function mount()
    {
        $this->link = !empty($this->link) ? $this->link : '#';
        $this->link_alias = !empty($this->link_alias) ? $this->link_alias : '#';
        $this->icon = !empty($this->icon) ? $this->icon : '#';
        $this->order = !empty($this->order) ? $this->order : 0;
    }

    public function submit()
    {
        dd($this->validate());
        $request = $this->validate();
        $this->menuService = new MenuService();
        return $this->menuService->save(new MenuDto(
            name: $request['name'],
            link: $request['link'],
            linkAlias: $request['link_alias'],
            icon: $request['icon'],
            parent: $request['parent'],
            order: $request['order']
        ));
    }
}
