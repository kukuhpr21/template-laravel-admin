<?php

namespace App\Livewire\Main\Roles;

use App\Services\Role\RoleService;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Create extends Component
{
    private RoleService $roleService;

    #[Validate(['required', 'unique:roles,name'])]
    public string $name = "";

    public function submit()
    {
        $request = $this->validate();

        $this->roleService = new RoleService();
        $result = $this->roleService->save($request['name']);

        $this->reset();

        $icon    = $result ? 'success' : 'error';
        $message = ($result ? 'Berhasil' : 'Gagal')." menambahkan data";
        $this->dispatch('sweet-alert-notif', icon: $icon, title: $message);
    }

    public function render()
    {
        return view('livewire.main.roles.create');
    }
}
