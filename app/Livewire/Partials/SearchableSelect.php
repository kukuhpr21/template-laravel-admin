<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Illuminate\Support\Collection;

abstract class SearchableSelect extends Component
{
    public $name;

    public $selected;

    public $selectedName;

    public $items;

    public $form;

    public $searchSelect;

    public $showList = false;

    public Collection $dataQuery;

    public function __construct() {
        $this->selected = '';
        $this->selectedName = '';
        $this->form = false;
        $this->searchSelect = '';
        $this->showList = false;
    }

    public function selectOption($id, $name)
    {
        $this->selected = $id;
        $this->selectedName = $name;
        $this->showList = false;
    }

    public function data()
    {
        if ($this->showList) {
            if ($this->dataQuery->isNotEmpty()) {
                if (!empty($this->searchSelect)) {
                    $likePattern = '%'.$this->searchSelect.'%';
                    $regexPattern = '/' . str_replace(['%', '_'], ['.*', '.'], $likePattern) . '/i';

                    $filtered = $this->dataQuery->filter(function ($item) use ($regexPattern) {
                        return preg_match($regexPattern, $item['name']);
                    });

                    return $filtered->all();
                } else {
                    return $this->dataQuery->all();
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.partials.searchable-select');
    }
}
