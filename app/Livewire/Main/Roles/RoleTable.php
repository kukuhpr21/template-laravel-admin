<?php

namespace App\Livewire\Main\Roles;

use App\Models\Role;
use Livewire\Component;
use App\Utils\Table\Column;
use App\Livewire\Partials\Table;
use Illuminate\Database\Eloquent\Builder;

class RoleTable extends Table
{
    public bool $buttonAdd = true;

    public bool $showIndexColumn = true;

    public $perPage = 2;

    public $search = '';

    protected $queryString = ['search'];

    public function __construct()
    {
        $this->buttonAddLink = route('roles-add');
    }

    public function query() : Builder
    {
        return Role::query();
    }

    public function columns() : array
    {
        return [
            Column::make(['name'], 'Name'),
            Column::make(['id'], 'Action')->component('columns.roles.action')
        ];
    }

    public function delete($id)
    {
        dd("masuk delete : ".$id);
    }
}
