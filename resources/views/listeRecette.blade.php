@extends('layout.layout')

@section('content')
    <a id="download-pdf"  target="_blank" href="{{ route('generate-pdf',['download'=>'pdf']) }}">Download PDF</a>

    <body>
        <div id="recette-img">photo recette</div>
        <div id="titre-ingredients"><h1 id="nom-recette">Titre de la recette</h1><div id="ingredients"><img src="#"><p>dessin blé</p><img src="#"><p>dessin pain</p></div></div>
        <hr>
    </body>

    <style>
        body
        {
            font-family: 'Montserrat', sans-serif;  
            overflow-x: hidden;
            width:100%;
            height: 100%;
            padding-top: 41vh;
            padding-left: 2vw;
            padding-right: 2vw;
            padding-bottom: 2vh;
        }
        #download-pdf
        {
            padding: 10px;
            z-index: 2;
            position: absolute;
            top: 0%;
            left: 0%;
            color: white;
            cursor: pointer;
            background-color: rgb(255, 0, 0);
        }
        #recette-img
        {
            position: absolute;
            left: 0%;
            top: 0%;
            width: 100vw;
            height: 40vh;
            background-image: url('#');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            border: solid 1px black;
            text-align: center;
        }
        #titre-ingredients
        {
            display: flex;
            justify-content: space-between;
        }
        #nom-recette
        {
            border: solid black 1px;
            padding-top: 18px;
            font-weight: 700;
            padding-left: 20px;
            padding-bottom: 0px;
            text-align: left;
            width: 50%;
        }
        #ingredients
        {
            width: 49%;
            border: 1px solid black;
            display: flex;
            padding-top: 28px;
            text-align: right;
        }
        #ingredients img
        {
            width: 20%;
            height: 50%;
        }
    </style>
@endsection
