<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyDiet account verification</title>
</head>
<body>
    <h1>Bonjour {{ $details['user_name']}}, confirmez votre compte</h1>


    <p>Cliquez sur ce lien pour valider votre compte :</p>

    <a href="http://webmydiet-env.eba-bmajpt3n.eu-west-3.elasticbeanstalk.com/api/account/verify/{{$details['token']}}">Valider mon compte</a>

    <p>Merci !</p>
</body>
</html>
