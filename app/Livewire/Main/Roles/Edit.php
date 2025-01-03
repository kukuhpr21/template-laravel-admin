<?php

namespace App\Livewire\Main\Roles;

use Livewire\Component;
use App\Utils\CryptUtils;
use Livewire\Attributes\Validate;
use App\Services\Role\RoleService;

class Edit extends Component
{
    private RoleService $roleService;

    private CryptUtils $cryptUtils;

    public $id;

    #[Validate(['required'])]
    public string $name = "";

    public function __construct()
    {
        $this->roleService = new RoleService();
        $this->cryptUtils = new CryptUtils();
    }

    public function mount($id)
    {
        $this->id = $this->cryptUtils::dec($id);
    }

    public function submit()
    {
        $request = $this->validate();
        $result  = $this->roleService->update($this->id,$request['name']);

        $icon     = $result->status ? 'success' : 'error';
        $this->id = $result->status ? $result->data['id'] : $this->id;

        if ($result->status) {
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
        $this->name = $this->roleService->get($this->id)->val;

        return view('livewire.main.roles.edit');
    }
}
