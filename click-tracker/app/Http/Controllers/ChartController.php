<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request, Response};
use App\Models\Click;
use App\Charts\ClicksChart;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index() {

        return view('index', [
        ]);
    }

    public function showChart() {
        $data = DB::table('clicks')
            ->select(DB::raw('hour(time) hour, count(*) as count'))
            ->groupBy('hour')
            ->get();

        $time = [];
        foreach ($data as $hour) {
            array_push($time, $hour->hour . ':00');
        }
        $click = [];
        foreach ($data as $clicks) {
            array_push($click, $clicks->count);
        }

        $chart = new ClicksChart;
        $chart->labels($time);
        $chart->dataset('Клики', 'line', $click)
            ->backgroundColor('#039AFA');
        $chart->Title('График распределения количества кликов по времени суток');

        return view('chart', compact('chart'));
    }

}
