<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProfilController extends Controller
{
    public function showGraph(){
        $chart = (new LarapexChart)->setType('line')
        ->setTitle('Total Users Monthly')
        ->setSubtitle('From January to March')
        ->setXAxis([
            'Jan', 'Feb', 'Mar'
        ])
        ->setColors(['#FF5759'])
        ->setDataset([
            [
                'name'  =>  'Active Users',
                'data'  =>  [250, 700, 1200]
            ]
        ]);
        $chart2 = (new LarapexChart)->setTitle('Posts')
        ->setDataset([150, 120, 50, 300])
        ->setColors(['#6FF626', '#FF5759','#B953F5','#E89F5A'])
        ->setLabels(['Published', 'No Published','testadd1', 'testadd2']);
        return view('chart', compact('chart'), compact('chart2'));
    }
}