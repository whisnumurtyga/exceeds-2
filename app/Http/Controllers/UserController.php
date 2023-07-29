<?php

namespace App\Http\Controllers;

use App\Charts\UserMajorChart;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request, UserMajorChart $userMajorChart)
    {
        return view('mutation', [
            'userMajorChart' => $userMajorChart->build(),
        ]);
    }
}
