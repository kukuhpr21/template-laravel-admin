<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate(['required'])]
    public string $username = "";

    #[Validate(['required'])]
    public string $password = "";

    public function login()
    {

        if (Auth::attempt($this->validate())) {
            return redirect()->route('dashboard');
        }

        throw ValidationException::withMessages([
            'Invalid username or password'
        ]);
    }
}
