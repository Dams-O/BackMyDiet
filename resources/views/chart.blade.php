<!doctype html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Chart Sample</title>
 </head>
 <body>
 
    {!! $chart->container() !!}
 
    <script src="{{ $chart->cdn() }}"></script>

    <!-- Or use the cdn directly -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->

    <!-- Or use the local library as asset the package already provides a publication with this file *see below -->

    <!-- <script src="{{ asset('vendor/larapex-charts/apexchart.js') }}"></script> -->
 
    {{ $chart->script() }}
    

    {!! $chart2->container() !!}
 
    <script src="{{ $chart2->cdn() }}"></script>

    <!-- Or use the cdn directly -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->

    <!-- Or use the local library as asset the package already provides a publication with this file *see below -->

    <!-- <script src="{{ asset('vendor/larapex-charts/apexchart.js') }}"></script> -->
 
    {{ $chart2->script() }}
    
 </body>


 </html>