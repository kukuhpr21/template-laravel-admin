<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\Menu\MenuService;
use App\Services\Session\SessionService;
use App\Services\User\IUserService;
use Illuminate\Support\Facades\Hash;

class UserService implements IUserService
{
    private SessionService $sessionService;

    private MenuService $menuService;

    public function __construct()
    {
        $this->sessionService = new SessionService();
        $this->menuService = new MenuService();
    }

    public function login(string $email, string $password): bool {

        // find user by email
        $user = User::with('roles')
                ->where('email', $email)
                ->first();

        if ($user) {
            // checking password
            $passwordMatch = Hash::check($password, $user->password);
            if ($passwordMatch) {
                // build tree menu
                $menus = $this->menuService->allByUser($user->id);
                dd($menus);

                $this->saveProfileToSession($user);
                return true;
            }
        }
        return false;
    }

    private function saveProfileToSession($user): void
    {
        $this->sessionService->save('id', $user->id);
        $this->sessionService->save('name', $user->name);
        $this->sessionService->save('email', $user->email);
        $this->sessionService->save('temp_role', $user->roles);
    }
}
