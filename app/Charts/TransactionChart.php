<?php

namespace App\Charts;

use App\Models\DummyTransaction;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TransactionChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $transactions = DummyTransaction::get();
        $data = [
            $transactions->where('type', 'Debit')->count(),
            $transactions->where('type', 'Kredit')->count(),
        ];
        $label = [
            'Debit',
            'Kredit'
        ];

        return $this->chart->donutChart()
            ->setTitle('Data Transaksi berdasarkan Jenis')
            ->setSubtitle(date('Y'))
            ->addData($data)
            ->setLabels($label);
    }
}
