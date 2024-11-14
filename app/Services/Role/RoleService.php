<?php

namespace App\Services\Role;

use App\Dto\KeyValDto;
use App\Dto\ResponseServiceDto;
use App\Models\Role;
use App\Models\RoleHasMenu;
use App\Models\UserHasRole;

class RoleService implements IRoleService
{
    public function save(string $name): ResponseServiceDto
    {
        $model       = new Role();
        $model->id   = $this->getID($name);
        $model->name = $name;

        // compose response
        $result        = $model->save();
        $detailMessage = 'menambahkan data';
        $message       = $result ? 'Berhasil ' : 'Gagal ';
        $message       = $message.$detailMessage;
        return new ResponseServiceDto($result, $message, $model);
    }

    public function get(string $id):KeyValDto|null
    {
        $role = Role::where('id', $id)->first();

        if (!$role) {
            return null;
        }
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

    public function delete(string $id): ResponseServiceDto
    {
        if ($this->roleIsNotUsed($id)) {
            $result = Role::where('id', $id)->delete();
            return new ResponseServiceDto($result, 'Berhasil hapus data');
        }
        return new ResponseServiceDto(false, 'Gagal hapus data, role sedang digunakan');
    }

    public function update(string $id, string $newName): ResponseServiceDto
    {
        $role = $this->get($this->getID($newName));

        if ($role == null) {
            if ($this->delete($id)) {
                $result = $this->save($newName);
                return new ResponseServiceDto($result->status, 'Berhasil merubah data', $result->data);
            }
        }
        return new ResponseServiceDto(false, 'Gagal merubah Data, role baru sudah digunakan');
    }

    private function roleIsNotUsed(string $roleID): bool
    {
        $roleHasMenu = RoleHasMenu::where('role_id', $roleID)->first();
        $userHasRole = UserHasRole::where('role_id', $roleID)->first();
        return !$roleHasMenu && !$userHasRole;
    }

    private function getID(string $name): string
    {
        return  strtolower(str_replace(" ", "_", $name));
    }
}
