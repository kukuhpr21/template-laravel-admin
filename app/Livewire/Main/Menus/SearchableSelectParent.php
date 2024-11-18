<?php

namespace App\Livewire\Main\Menus;

use App\Models\Menu;
use App\Services\Menu\MenuService;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Livewire\Partials\SearchableSelect;

class SearchableSelectParent extends SearchableSelect
{
    public $showList = false;

    public Collection $dataQuery;

    private MenuService $menuService;

    public function __construct() {
        $this->menuService = new MenuService();
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
