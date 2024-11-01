<?php

namespace App\Services\Role;

use App\Dto\KeyValDto;

interface IRoleService
{
    public function save(string $name): bool;
    public function get(string $id): KeyValDto;
    public function all(): array;
    public function delete(string $id): bool;
    public function update(string $id, string $newName): bool;
}
