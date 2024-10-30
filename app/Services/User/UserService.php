<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\Session\SessionService;
use App\Services\User\IUserService;
use Illuminate\Support\Facades\Hash;

class UserService implements IUserService
{
    private SessionService $sessionService;

    public function __construct()
    {
        $this->sessionService = new SessionService();
    }

    public function login(string $email, string $password): bool {

        // find user by email
        $user = User::with('roles')
                ->with('menus')
                ->where('email', $email)
                ->first();

        if ($user) {
            // checking password
            $passwordMatch = Hash::check($password, $user->password);
            if ($passwordMatch) {
                $this->saveUserToSession($user);
                return true;
            }
        }
        return false;
    }

    private function saveUserToSession($user): void
    {
        $this->sessionService->save('id', $user->id);
        $this->sessionService->save('name', $user->name);
        $this->sessionService->save('email', $user->email);
        $this->sessionService->save('role', $user->roles);
    }
}
