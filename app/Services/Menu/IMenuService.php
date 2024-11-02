<?php

namespace App\Services\Menu;

use App\Dto\MenuDto;

interface IMenuService
{
    public function save(MenuDto $dto): bool;
    public function get(string $id): MenuDto;
    public function all(): array;
    public function allByUser(string $userID, bool $buildTree = true): array;
    public function delete(string $id): bool;
    public function update(MenuDto $dto): bool;
}
