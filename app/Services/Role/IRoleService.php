<?php

namespace App\Services\Role;

use App\Dto\KeyValDto;
use App\Dto\ResponseServiceDto;

interface IRoleService
{
    public function save(string $name): ResponseServiceDto;
    public function get(string $id): KeyValDto|null;
    public function all(): array;
    public function delete(string $id): bool;
    public function update(string $id, string $newName): ResponseServiceDto;
}
