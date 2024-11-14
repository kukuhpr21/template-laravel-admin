<?php

namespace App\Livewire\Main\Roles;

use Livewire\Component;

class Index extends Component
{
    public function mount()
    {
        if (session('notif')) {
            $this->dispatch('sweet-alert-notif', icon: session('notif.icon'), title: session('notif.message'));
        }
    }

    public function render()
    {
        return view('livewire.main.roles.index');
    }
}
