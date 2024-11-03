<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\LoginForm;
use App\Services\Session\SessionService;

#[Layout('layouts.guest')]
#[Title('Log In')]
class Login extends Component
{
    public LoginForm $form;

    private SessionService $sessionService;

    public function login()
    {
        $successLogin = $this->form->login();
        if ($successLogin) {

            $this->sessionService = new SessionService();

            $tempRole       = $this->sessionService->get('temp_role');
            $tempRoleDecode = json_decode($tempRole, true);

            if (count($tempRoleDecode) > 1) {
                return redirect()->route('choose-role');
            }

            $this->sessionService->save('role', json_encode($tempRoleDecode[0]));
            $this->sessionService->delete('temp_role');

            return redirect()->route('dashboard');
        } else {
            $this->dispatch('sweet-alert-notif', icon: 'error', title: 'Invalid Email or Password');
        }
    }

    public function render()
    {
        return view('livewire.guest.login');
    }
}
