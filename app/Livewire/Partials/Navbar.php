<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Services\Session\SessionService;

class Navbar extends Component
{
    private SessionService $sessionService;

    public ?string $name;

    public ?string $role;

    public function __construct()
    {
        $this->sessionService = new SessionService();
        $this->name =  $this->sessionService->get('name');
        $this->role =  json_decode($this->sessionService->get('role'), true)['name'];
    }

    public function logout()
    {
        $this->dispatch(
            'sweet-alert-modal-confirm',
            icon: 'info',
            title: 'Confirm',
            text: 'Are you sure you want to log out?',
            confirmtext: 'Log Out',
            confirmlink: route('logout')
        );
    }
    public function render()
    {
        $data = [
            'name' => $this->name,
            'role' => $this->role,
        ];
        return view('livewire.partials.navbar',$data);
    }
}
