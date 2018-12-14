@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-8"><h1>Liste des utilisateurs</h1></div>
        <div class="col-md-4">

            <form class="form-inline" autocomplete="off">
                <div class="form-group autocomplete">
                <input id="myInput" type="text" name="myCountry" placeholder="Nom">
                </div>
            </form>
        </div>
    </div>
    

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

    <script>
        // Création du tableau vide
        var nom = [];
        @foreach ($username as $user)
            nom.push("<?php echo $user; ?>");
        @endforeach
    </script>

@endsection

@section('custom-js')
    <script type="text/javascript" src="{{ URL::asset('js/dashboard.js') }}"></script>
@endsection
