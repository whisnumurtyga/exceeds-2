<?php

namespace App\Http\Controllers;

use App\Charts\TransactionChart;
use App\Charts\TransactionLabelChart;
use App\Charts\TransactionLineChart;
use Illuminate\Http\Request;

class DummyTransactionController extends Controller
{
    public function index(TransactionChart $transactionChart, TransactionLabelChart $transactionLabelChart, TransactionLineChart $transactionLineChart)
    {
        return view('mutation', [
            'transactionChart' => $transactionChart->build(),
            'transactionLabelChart' => $transactionLabelChart->build(),
            'transactionLineChart' => $transactionLineChart->build(),
        ]);
    }
}
