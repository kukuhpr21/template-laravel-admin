<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate(['required'])]
    public string $email = "";

    #[Validate(['required'])]
    public string $password = "";

    public function losgin()
    {

        // find user ssby email
        $request = $this->validate();
        $user = User::with('roles')
                ->with('menus')
                ->where('email', $request['email'])
                ->first();

        if ($user) {

        } else {

        }
        // if (Auth::attempt($this->validate())) {
        //     return redirect()->route('dashboard');
        // }

        // session()->flash('failed', 'Invalid username or password');
    }
}
