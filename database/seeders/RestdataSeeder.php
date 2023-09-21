<?php

namespace Database\Seeders;

use App\Models\Restdata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestdataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            [
                'message' => 'Google Japan',
                'url' => 'https://www.google.co.jp'
            ],
            [
                'message' => 'Yahoo Japan',
                'url' => 'https://www.yahoo.co.jp'
            ],
            [
                'message' => 'MSN Japan',
                'url' => 'https://www.msn.com/ja-jp'
            ]
        ];

        $restdata = new Restdata();
        $restdata->insert($params);
    }
}
