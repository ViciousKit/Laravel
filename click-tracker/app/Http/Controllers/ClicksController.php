<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Click;

class ClicksController extends Controller
{

    public function position(Request $request)
    {
        $stats = $request->input();

        foreach ($stats as $click) {
            Click::create([
                'pos_x' => $click['pos_x'],
                'pos_y' => $click['pos_y']
            ]);
        }

    }
}
