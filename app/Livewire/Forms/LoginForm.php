<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate(['required'])]
    public string $email = "";

    #[Validate(['required'])]
    public string $password = "";

    public function login()
    {

        // if (Auth::attempt($this->validate())) {
        //     return redirect()->route('dashboard');
        // }

        // session()->flash('failed', 'Invalid username or password');
    }
}
