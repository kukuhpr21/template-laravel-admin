<?php

namespace App\Livewire;

use App\Charts\MonthlyUsersChart;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(MonthlyUsersChart $chart)
    {
        $data = ['chart' => $chart->build()];

        return view('livewire.dashboard', ['chart' => $chart->build()]);
    }
}
