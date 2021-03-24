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
                <span>{{$user->first_name}}</span>
                <span>{{$user->last_name}}</span>
                <span>{{$user->mail}}</span>
                <span> Email vérifié : 
                    @if($user->email_verified == 1)
                        Oui
                    @else
                        Non
                    @endif
                </span>
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
                        {!! $stats_chart->container() !!}
                    
                        <script src="{{ $stats_chart->cdn() }}"></script>
                    
                        {{ $stats_chart->script() }}
                    </div>
                     
                    <div class="chart3">
                        {!! $goals_chart->container() !!}
        
                        <script src="{{ $goals_chart->cdn() }}"></script>
                    
                        {{ $goals_chart->script() }}
                    </div>  
                </div>
            </div>

            <div id="progression">
                    <ul>
                        <li>Score mensuel : {{$user_score}}</li>
                        <li>Objectif de score : {{$goal_score}}</li>
                        <li>Progression : 
                            
                            @if($goal_score > 0)
                                {{ round(($user_score*100)/$goal_score, 1).'%'}}
                            @else
                                Pas de goal !
                            @endif
                        </li>
                    </ul>
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