<?php

namespace App\Livewire;

use App\Charts\MonthlyUsersChart;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(MonthlyUsersChart $chart)
    {
        $initialMarkers = [
            [
                'position' => [
                    'lat' => 28.625485,
                    'lng' => 79.821091
                ],
                'draggable' => true
            ],
            [
                'position' => [
                    'lat' => 28.625293,
                    'lng' => 79.817926
                ],
                'draggable' => false
            ],
            [
                'position' => [
                    'lat' => 28.625182,
                    'lng' => 79.81464
                ],
                'draggable' => true
            ]
        ];
        $data = [
            'chart' => $chart->build(),
            'initialMarkers' => $initialMarkers
        ];

        return view('livewire.dashboard', $data);
    }
}
