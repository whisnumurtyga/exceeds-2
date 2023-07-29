<?php

namespace App\Charts;

use App\Models\DummyTransaction;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TransactionLabelChart
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
            $transactions->where('label', 'Invest')->count(),
            $transactions->where('label', 'Cicilan')->count(),
            $transactions->where('label', 'Pembelian')->count(),
            $transactions->where('label', 'Pemindahan Dana')->count(),
            $transactions->where('label', 'Internet')->count(),
            $transactions->where('label', 'Pajak')->count(),
            $transactions->where('label', 'BPJS')->count(),
            $transactions->where('label', 'Asuransi')->count(),
            $transactions->where('label', 'Listrik/')->count(),
        ];
        $label = [
            'Invest',
            'Cicilan',
            'Pembelian',
            'Pemindahan Dana',
            'Internet',
            'Pajak',
            'BPJS',
            'Asuransi',
            'Listrik/',
        ];

        return $this->chart->donutChart()
            ->setTitle('Data Transaksi berdasarkan Label')
            ->setSubtitle(date('Y'))
            ->addData($data)
            ->setLabels($label);
    }
}
