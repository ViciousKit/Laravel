<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Click;

class HeatmapController extends Controller
{
    public function showMap() {
        $coordinates = Click::select('pos_x', 'pos_y')->get();

        $coordForJs = [];
        foreach ($coordinates as $click) {
            $coordForJs[] = [
                $click['pos_x'],
                $click['pos_y'],
                1
            ];
        }

        return view('heatmap', [
            'coords' => $coordForJs
        ]);
    }
}
