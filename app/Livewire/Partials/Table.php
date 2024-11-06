<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

abstract class Table extends Component
{
    use WithPagination;

    public bool $buttonAdd = false;

    public string $buttonAddtext = 'Tambah';

    public string $buttonAddLink = '#';

    public bool $showIndexColumn = false;

    public $perPage = 10;

    public $page = 1;

    public $sortBy = '';

    public $sortDirection = 'asc';

    public $search = '';

    public abstract function query(): Builder;

    public abstract function columns(): array;

    public function data()
    {
        return $this
        ->query()
        ->when($this->sortBy !== '', function ($query) {
            $query->orderBy($this->sortBy, $this->sortDirection);
        })
        ->paginate($this->perPage);
    }

    public function sort($key) {
        $this->resetPage();

        if ($this->sortBy === $key) {
            $direction = $this->sortDirection === 'asc' ? 'desc' : 'asc';
            $this->sortDirection = $direction;

            return;
        }

        $this->sortBy = $key;
        $this->sortDirection = 'asc';
    }

    public function render()
    {
        return view('livewire.partials.table');
    }
}
