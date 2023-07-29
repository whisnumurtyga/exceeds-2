<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class UserMajorChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        $users = User::get();
        $data = [
            $users->where('role', 'Informatika')->count(),
            $users->where('role', 'Data Sains')->count(),
            $users->where('role', 'Teknologi Informasi')->count(),
            $users->where('role', 'Sistem Informasi')->count(),
        ];
        $label = [
            'Informatika',
            'Data Sains',
            'Sistem Informasi',
            'Teknologi Informasi'
        ];

        return $this->chart->radialChart()
            ->setTitle('Data User Per Role')
            ->setSubtitle(date('Y'))
            ->addData($data)
            ->setLabels($label);
            // ->setColors(['#D32F2F', '#03A9F4']);
    }
}
