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