<?php

namespace App\Livewire\Forms;

use App\Services\Session\SessionService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ChooseRoleForm extends Form
{
    #[Validate(['required'])]
    public string $role = "";

    private SessionService $sessionService;

    public function submit()
    {
        $this->sessionService = new SessionService();

        $this->validate();

        $tempRole = $this->sessionService->get('temp_role');

        $tempRoleDecode = json_decode($tempRole, true);

        foreach ($tempRoleDecode as $item) {
            if ($item['id'] == $this->role) {
                $this->sessionService->save('role', json_encode($item));
                $this->sessionService->delete('temp_role');
                break;
            }
        }
    }
}
