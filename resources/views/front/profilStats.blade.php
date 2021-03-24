@extends('layout.layout')

@section('content')
    <h1>Statistique pour {{$user->first_name}} {{$user->last_name}}</h1>

    {{dd($stats->getData())}}
    
    <a class="btn btn-primary"" href="/dashboard" role="button">Retour</a>

@endsection
