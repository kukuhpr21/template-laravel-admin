<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Illuminate\Support\Collection;

class Table extends Component
{
    public array $columns = [];
    public Collection $data;

    // Mount method to initialize properties
    public function mount(array $columns, Collection $data)
    {
        $this->columns = $columns;
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.partials.table');
    }
}
