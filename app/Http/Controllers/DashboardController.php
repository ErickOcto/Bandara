<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Speedtest;


class DashboardController extends Controller
{
    public function index(){
    $totalSpeedtests = Speedtest::count();

    $speedtests = Speedtest::join('users', 'speedtests.user_id', '=', 'users.id')
    ->select('speedtests.*', 'users.name as user_name')
    ->get();
        return view('Admin.dashboard', compact('speedtests', 'totalSpeedtests'));
    }
}
