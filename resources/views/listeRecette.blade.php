@extends('layout.layout')

@section('content')
    <a id="download-pdf"  target="_blank" href="{{ route('generate-pdf',['download'=>'pdf']) }}">Download PDF</a>

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
@endsection
