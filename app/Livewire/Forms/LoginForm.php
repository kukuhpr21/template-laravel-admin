<?php

namespace App\Livewire\Forms;

use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate(['required'])]
    public string $email = "";

    #[Validate(['required'])]
    public string $password = "";

    private UserService $userService;

    public function login(): bool
    {
        $this->userService = new UserService();

        // find user ssby email
        $request = $this->validate();
        return $this->userService->login($request['email'], $request['password']);
    }
}
