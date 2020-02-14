<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>MyDiet - Ajout Recette</title>
    </head>
    <body>
    <div class="row">
        <div class="col-md-12 center"><h1>Ajouter une recette</h1></div>
        <div class="col-md-2">
            <form class="form-inline" method="POST" action="/register">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                    <label for="nom">Nom : </label>
                    <input id="nom" type="text" name="last_name" placeholder="Nom" required> <br /> <br />
                    <label for="prenom">Prenom : </label>
                    <input id="prenom" type="text" name="first_name" placeholder="Prenom" required> <br /> <br />
                    <label for="pseudo">Pseudo : </label>
                    <input id="pseudo" type="text" name="user" placeholder="Pseudo" required> <br /> <br />
                    <label for="email">Adresse mail : </label>
                    <input id="email" type="text" name="mail" placeholder="exemple@gmail.com" required> <br /> <br />
                    <label for="pass">Mot de passe : </label><input type="password" required name="pass" /> <br /> <br />
                    <input type="submit" value="S'inscrire" />
                </div>
            </form>
        </div>
    </div>
    </body>