<?php

namespace App\Livewire\Main\Roles;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public function render()
    {
        return view('livewire.main.roles.index', [
            'columns' => ['id', 'name'],
            'data' => Role::all()
        ]);
    }
}
