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

    public function build()
    {
        return $this->chart->lineChart()
            ->setTitle('Monthly Report')
            ->setSubtitle('Season 2024')
            ->addLine('Total',[70, 39, 77, 28, 55, 45])
            ->setXAxis(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni']);
    }
}
