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


        $icon = $result->status ? 'success' : 'error';

        if ($result->status) {
            $this->reset();

            session()->flash('notif', [
                'icon' => $icon,
                'message' => $result->message
            ]);

            return redirect()->route('roles');
        } else {
            $this->dispatch('sweet-alert-notif', icon: $icon, title: $result->message);
        }
    }

    public function render()
    {
        return view('livewire.main.roles.create');
    }
}
