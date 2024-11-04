<?php

namespace App\Livewire\Main\Roles;

use App\Models\Menu;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        // dd(Menu::paginate(5)->toArray());
        return view('livewire.main.roles.index', [
            'columns' => ['id', 'name'],
            'data' => Menu::paginate(5)
        ]);
    }
}
