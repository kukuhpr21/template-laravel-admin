<?php

namespace App\Livewire\Main\Menus;

use App\Services\Menu\MenuService;
use Illuminate\Support\Collection;
use App\Livewire\Partials\SearchableSelect;
use Illuminate\Support\Facades\Log;

class SearchableSelectParent extends SearchableSelect
{
    public Collection $dataQuery;

    private MenuService $menuService;

    public function __construct() {
        $this->menuService = new MenuService();
    }

    public function selectOption($id, $name)
    {
        $this->dispatch('valueParentUpdated', $id);
        $this->selected = $id;
        $this->selectedName = $name;
        $this->showList = false;
    }

    public function query() : Collection
    {
        $this->showList = !$this->showList;
        $parents        = array();
        $allParent      = $this->menuService->allParent();

        array_push($parents, ['id' => '#', 'name' => 'Default Parent']);

        foreach ($allParent as $item) {
            array_push($parents, ['id' => $item['id'], 'name' => $item['name']]);
        }
        $this->dataQuery =  collect($parents);
        return $this->dataQuery;
    }
}
