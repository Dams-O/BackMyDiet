@extends('layout')

@section('content')
    <h1>Liste des utilisateurs</h1>

    <table class="table table-hover">   
        <thead>
            <tr class="success">
                <th>Nom</th>
                <th>Prenom</th>
                <th>Pseudo</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td><strong><a href="viewProfilStats/<?php echo $user->id_utilisateur; ?>"><?php echo $user->nom; ?></a></strong></td>
                <td><?php echo $user->prenom; ?></td>
                <td><?php echo $user->pseudo; ?></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-success">Validé</button>
    <button type="button" class="btn btn-danger">Supprimer</button>
    <form action="viewDashboard">
    <button type="button" class="btn btn-primary">Retour</button>
    </form>
@endsection
