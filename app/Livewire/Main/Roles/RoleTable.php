<?php

namespace App\Livewire\Main\Roles;

use App\Models\Role;
use Livewire\Component;
use App\Utils\Table\Column;
use App\Livewire\Partials\Table;
use Illuminate\Database\Eloquent\Builder;

class RoleTable extends Table
{
    public $perPage = 2;

    public function query() : Builder
    {
        return Role::query();
    }

    public function columns() : array
    {
        return [
            Column::make(['id'], 'ID'),
            Column::make(['name'], 'Name'),
            Column::make(['id'], 'Action')->component('columns.roles.action')
        ];
    }

    public function delete($id)
    {
        dd("masuk delete : ".$id);
    }
}
