<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Route;
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

    protected $queryString = ['search'];

    protected $updatesQueryString = ['page', 'perPage'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public abstract function query(): Builder;

    public abstract function columns(): array;

    public function data()
    {
        return $this
        ->query()
        ->when($this->sortBy !== '', function ($query) {
            $query->orderBy($this->sortBy, $this->sortDirection);
        })
        ->when($this->search !== '', function($query) {
            foreach ($this->columns() as $item) {
                $query->where($item->key[0], 'like', '%'.$this->search.'%');
            }
        })
        ->paginate($this->perPage);
    }

    // public function updatingPerPage()
    // {
    //     $this->page = 1;
    //     dd(Route::currentRouteName());
    //     return redirect()->route(Route::currentRouteName(), ['perPage' => $this->perPage]);
    // }

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
