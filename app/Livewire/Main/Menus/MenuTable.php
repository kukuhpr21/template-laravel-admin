<?php

namespace App\Livewire\Main\Menus;

use App\Models\Menu;
use App\Utils\Table\Column;
use App\Livewire\Partials\Table;
use Illuminate\Database\Eloquent\Builder;

class MenuTable extends Table
{
    public bool $buttonAdd = true;

    public bool $showIndexColumn = true;

    public $search = '';

    protected $queryString = ['search'];

    public function __construct()
    {
        $this->buttonAddLink = route('menus-add');
    }

    public function query() : Builder
    {
        return Menu::query();
    }

    public function columns() : array
    {
        return [
            Column::make(['name'], 'Name'),
            Column::make(['link'], 'Link'),
            Column::make(['link_alias'], 'Link Alias'),
            Column::make(['icon'], 'Icon'),
            Column::make(['parent'], 'Parent'),
            Column::make(['order'], 'Order'),
            Column::make(['id'], 'Action')->component('columns.roles.action')
        ];
    }

    public function delete($id)
    {
    }

    public function deleteConfirm($id)
    {
    }
}
