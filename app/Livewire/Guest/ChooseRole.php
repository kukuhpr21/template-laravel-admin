<?php

namespace App\Livewire\Guest;

use App\Dto\KeyValDto;
use Livewire\Component;
use App\Livewire\Forms\ChooseRoleForm;
use App\Services\Session\SessionService;

class ChooseRole extends Component
{
    public ChooseRoleForm $form;

    private SessionService $sessionService;

    public function __construct() {
        $this->sessionService = new SessionService();
    }

    public function submit()
    {
        $this->form->submit();
        return redirect()->route('dashboard');
    }

    public function render()
    {
        $tempRole = $this->sessionService->get('temp_role');
        $tempRoleDecode = json_decode($tempRole, true);

        $roles = array();

        foreach ($tempRoleDecode as $role) {
            array_push($roles, new KeyValDto($role['id'], $role['name']));
        }

        $data  = [
            'roles' => $roles
        ];

        return view('livewire.guest.choose-role', $data);
    }
}
