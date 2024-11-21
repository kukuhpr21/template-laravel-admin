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

    #[Validate(['required'])]
    public string $link = "";

    #[Validate(['required'])]
    public string $link_alias = "";

    #[Validate(['required'])]
    public string $icon = "";

    #[Validate(['required|integer'])]
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
