@extends('layout.layout')

@section('content')
    <a href="{{ route('generate-pdf',['download'=>'pdf']) }}">Download PDF</a>

    <div class="container">
        <div class="header-image">
            <img src="">
        </div>
        <div class="recipe-container">
            <div class="recipe-title">
                <h1>Titre de la recette</h1>
                <div>dessin de blé</div>
            </div>
            <div class="recipe-prep">
                <span>Cuisson : <B>40mn</B></span>
                <span>Préparation : <B>1h</B></span>
            </div>
        </div>
    </div>
    <style>
        .header-image {
            background-size: cover;
            background-position: center center;
            border: 1px solid;
            height: 200px;
            width: 100%;
        }
    </style>
@endsection
