<?php

namespace App\Services\Session;

interface ISessionService
{
    public function save(string $key, string $value): void;
    public function get(string $key): string;
    public function delete(string $key): void;
    public function deleteMain(): void;
    public function isExist(): bool;
}
