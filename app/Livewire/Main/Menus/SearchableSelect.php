<?php

namespace App\Livewire\Main\Menus;

use App\Models\Menu;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SearchableSelect extends Component
{
    public $searchSelect = '';
    public $options = [];
    public $selectedOption = null;

    // public function mount()
    // {
    //     $this->options = Menu::query()
    //     ->get()
    //     ->toArray();
    // }

    public function query()
    {
        if (!empty($this->searchSelect)) {
            $this->options = Menu::query()
            ->where('name', 'like', '%' . $this->searchSelect . '%') // Adjust column name
            ->limit(10)
            ->get()
            ->toArray();
        } else {
            $this->options = Menu::query()->limit(15)
            ->get()
            ->toArray();
        }

    }

    public function selectOption($optionId)
    {
        $this->selectedOption = $optionId;
        $this->searchSelect = '';
        $this->options = [];
    }

    public function render()
    {
        return view('livewire.main.menus.searchable-select');
    }
}
