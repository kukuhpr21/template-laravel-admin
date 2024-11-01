<?php

namespace App\View\Components;

use App\Services\Session\SessionService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    private SessionService $sessionService;


    public function __construct(
        public ?string $name,
        public ?string $role
    )
    {
        $this->sessionService = new SessionService();
        $this->name =  $this->sessionService->get('name');
        $this->role =  json_decode($this->sessionService->get('role'), true)['name'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
