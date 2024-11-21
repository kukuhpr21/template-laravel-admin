<?php

namespace App\Services\Menu;

use App\Dto\MenuDto;
use App\Dto\ResponseServiceDto;

interface IMenuService
{
    public function save(MenuDto $dto): ResponseServiceDto;
    public function get(string $id): MenuDto;
    public function all(): array;
    public function allByUser(string $userID, bool $buildTree = true): array;
    public function allParent(): array;
    public function delete(string $id): bool;
    public function update(MenuDto $dto): bool;
}
