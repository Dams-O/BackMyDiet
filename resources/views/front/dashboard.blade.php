<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Validation de commande</title>
  </head>
  <body>
    <h1>Liste des utilisateurs</h1>

    <table>
        <caption>Les utilisateurs</caption>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td><strong>{{$user->nom}}</strong></td>
                <td>{{$user->prenom}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

  </body>
</html>
