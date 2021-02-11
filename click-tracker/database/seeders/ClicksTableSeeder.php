<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Click;

class ClicksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clicks = [
            [
                'pos_x' => 551,
                'pos_y' => 336,
                'time' => '2007-10-23 11:37:55'
            ],
            [
                'pos_x' => 800,
                'pos_y' => 336,
                'time' => '2007-10-23 11:37:55'
            ],
            [
                'pos_x' => 800,
                'pos_y' => 336,
                'time' => '2007-10-23 15:37:55'
            ],
            [
                'pos_x' => 400,
                'pos_y' => 300,
                'time' => '2007-10-23 13:37:55'
            ],
        ];

        \DB::table('clicks')->insert($clicks);
    }
}
