<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): LarapexChart
    {
        $chart =  $this->chart->lineChart();
        $chart->setTitle('Sales during 2021.');
        $chart->setSubtitle('Physical sales vs Digital sales.');
        $chart->addLine('Physical sales', [40, 93, 77, 42, 18, 82]);
        $chart->addLine('Digital sales', [70, 29, 77, 28, 55, 45]);
        $chart->setXAxis( ['January', 'February', 'Maret', 'April', 'May', 'June']);
        $chart->setWidth(600);
        return $chart;
    }
}
