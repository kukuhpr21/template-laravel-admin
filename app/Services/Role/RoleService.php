<?php

namespace App\Services\Role;

use App\Dto\KeyValDto;
use App\Models\Role;
use App\Models\RoleHasMenu;
use App\Models\UserHasRole;

class RoleService implements IRoleService
{
    public function save(string $name): bool
    {
        $id = strtolower(str_replace(" ", "_", $name));
        return Role::create([
            'id'   => $id,
            'name' => $name
        ]);
    }

    public function get(string $id): KeyValDto
    {
        $role = Role::where('id', $id)->first();
        return new KeyValDto($role->id, $role->name);
    }

    public function all(): array
    {
        $roles  = Role::all();
        $result = array();
        if ($roles) {
            foreach ($roles as $role) {
                array_push($result, new KeyValDto($role->id, $role->name));
            }
        }
        return $result;
    }

    public function delete(string $id): bool
    {
        if ($this->roleIsNotUsed($id)) {
            return Role::where('id', $id)->delete();
        }
        return false;
    }

    public function update(string $id, string $newName): bool
    {
        if ($this->delete($id)) {
            return $this->save($newName);
        }
        return false;
    }

    private function roleIsNotUsed(string $roleID): bool
    {
        $roleHasMenu = RoleHasMenu::where('role_id', $roleID)->first();
        $userHasRole = UserHasRole::where('role_id', $roleID)->first();
        return !$roleHasMenu && !$userHasRole;
    }
}
