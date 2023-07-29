<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class TransactionLineChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $data = DB::table('dummy_transactions')
        ->select(DB::raw("DATE_FORMAT(date, '%Y-%m') as month"), DB::raw("SUM(amount) as total_amount"))
        ->where('type', 'Kredit')
        ->groupBy('month')
        ->get()
        ->toArray();

        $months = $data ? array_column($data, 'month') : [];
        $amounts = $data ? array_column($data, 'total_amount') : [];
        $monthName = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Okt', 'Nov', 'Dec'];

        return $this->chart->lineChart()
        ->setTitle('Cash Out')
        ->setSubtitle('Cash Out This Year')
        ->addData('Cash Out Amount', $amounts)
        ->setXAxis($monthName);

    }
}
