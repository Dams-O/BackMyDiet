<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Statistique</title>
  </head>
  <body>
    <h1>Statistique</h1>

    <table>
        <caption>Les statistique</caption>
        <thead>
            <tr>
                <th>Xp</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($stats as $stat)
            <tr>
                <td><strong>{{$stat->xp}}</strong></td>
                <td>{{$stat->tier}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

  </body>
</html>
