<?php

namespace App\Livewire;

use App\Livewire\Forms\LoginForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
class Login extends Component
{
    public LoginForm $form;

    public function login()
    {
        $successLogin = $this->form->login();
        if ($successLogin) {
            $this->dispatch('sweet-alert', icon: 'success', title: 'Success Log In');
            return redirect()->route('dashboard');
        } else {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Invalid Email or Password');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
