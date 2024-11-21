<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateMenuForm extends Form
{
    #[Validate(['required'])]
    public string $parent = "";

    public function submit()
    {
        Log::info($this->validate());
        $this->validate();
    }
}
