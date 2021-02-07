@extends('layout.layout')

@section('custom_css')
<link rel="stylesheet" href="{{URL::asset('css/pages/profil.css')}}"/>
@endsection
@include('layout.header_layout')
@section('content')
    <main>
        <section class="card">
            <img src="user.png"/>
            <div class="info">
                <span>User Info</span>
                <span>20 ans - Homme</span>
            </div>
        </section>
        <section class="tabContainer">
            <div class="buttonContainer">
                <button onclick="showPanel(0, 'rgba(255, 255, 255')">1 SEMAINE</button>
                <button onclick="showPanel(1, 'rgba(255, 255, 255')">1 MOIS</button>
                <button onclick="showPanel(2, 'rgba(255, 255, 255')">1 ANNÉE</button>
            </div>
            <div class="tabPanel">
            <div class="chartpie">
            <div class="chart2">
                {!! $chart2->container() !!}
             
                <script src="{{ $chart2->cdn() }}"></script>
            
                <!-- Or use the cdn directly -->
            
                <!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
            
                <!-- Or use the local library as asset the package already provides a publication with this file *see below -->
            
                <!-- <script src="{{ asset('vendor/larapex-charts/apexchart.js') }}"></script> -->
             
                {{ $chart2->script() }}
            </div>
            <div class="chart3">
                {!! $chart3->container() !!}
 
                <script src="{{ $chart3->cdn() }}"></script>
            
                <!-- Or use the cdn directly -->
            
                <!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
            
                <!-- Or use the local library as asset the package already provides a publication with this file *see below -->
            
                <!-- <script src="{{ asset('vendor/larapex-charts/apexchart.js') }}"></script> -->
             
                {{ $chart3->script() }}
            </div> 
             <div class="chart4">
                {!! $chart4->container() !!}
 
                <script src="{{ $chart4->cdn() }}"></script>
            
                <!-- Or use the cdn directly -->
            
                <!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
            
                <!-- Or use the local library as asset the package already provides a publication with this file *see below -->
            
                <!-- <script src="{{ asset('vendor/larapex-charts/apexchart.js') }}"></script> -->
             
                {{ $chart4->script() }}
            </div>    
            </div> 
              <div class="chart1">
                {!! $chart->container() !!}
 
                <script src="{{ $chart->cdn() }}"></script>
            
                <!-- Or use the cdn directly -->
            
                <!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
            
                <!-- Or use the local library as asset the package already provides a publication with this file *see below -->
            
                <!-- <script src="{{ asset('vendor/larapex-charts/apexchart.js') }}"></script> -->
             
                {{ $chart->script() }}
            </div>    
                <div class="containt">
                    Value 1
                </div>
            </div>
            <div class="tabPanel">
                <div class="containt">
                    Value 2
                </div>
            </div>
            <div class="tabPanel">
                <div class="containt">
                    Value 3
                </div>
            </div>
        </section>
        <section>

        </section>
    </main>

    <script src="{{URL::asset('js/TabShow.js')}}"></script>

@endsection