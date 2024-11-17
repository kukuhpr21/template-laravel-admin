<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateMenuForm extends Form
{
    #[Validate(['required'])]
    public string $parent = "";

    public function submit()
    {
        $this->validate();
    }
}
