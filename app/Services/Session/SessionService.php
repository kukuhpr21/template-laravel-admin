<?php

namespace App\Services\Session;

interface SessionService
{
    public function save(string $key, string $value): void;
    public function get(string $key): string;
    public function delete(string $key): void;
}
