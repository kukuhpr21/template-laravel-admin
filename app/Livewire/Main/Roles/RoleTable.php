<?php

namespace App\Livewire\Main\Roles;

use App\Models\Role;
use App\Utils\CryptUtils;
use App\Utils\Table\Column;
use App\Livewire\Partials\Table;
use App\Services\Role\RoleService;
use Illuminate\Database\Eloquent\Builder;

class RoleTable extends Table
{
    private RoleService $roleService;

    private CryptUtils $cryptUtils;

    public $id;

    public bool $buttonAdd = true;

    public bool $showIndexColumn = true;

    public $search = '';

    protected $queryString = ['search'];

    public function __construct()
    {
        $this->buttonAddLink = route('roles-add');
        $this->roleService = new RoleService();
        $this->cryptUtils = new CryptUtils();
    }

    public function query() : Builder
    {
        return Role::query();
    }

    public function columns() : array
    {
        return [
            Column::make(['name'], 'Name'),
            Column::make(['id'], 'Action')->component('columns.roles.action')
        ];
    }

    public function delete($id)
    {
        $result = $this->roleService->delete($id);

        session()->flash('notif', [
            'icon' => $result->status ? 'success' : 'error',
            'message' => $result->message
        ]);

        return redirect()->route('roles');
    }

    public function deleteConfirm($id)
    {
        $id = $this->cryptUtils::dec($id);
        $role = $this->roleService->get($id);

        if ($role) {
            $this->dispatch(
                'sweet-alert-modal-confirm',
                icon: 'info',
                title: 'Confirm',
                text: 'Role '.$role->val.' akan dihapus ?',
                confirmtext: 'Hapus',
                confirmlink: route('roles-delete', ['id' => $id]));
        } else {
            $this->dispatch('sweet-alert-notif', icon: 'error', title: 'Role tidak ditemukan');
        }
    }
}
