<?php

namespace App\Services\User;

interface IUserService
{
    public function login(string $email, string $password): bool;
}
