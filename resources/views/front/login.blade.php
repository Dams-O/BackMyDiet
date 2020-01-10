<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="../../../public/css/forms.css" />
        <title>MyDiet - Connection</title>
    </head>
    <body>
    <form method="POST" action="auth">
        {{ csrf_field() }}
        <fieldset class="formCont"> 
            <legend>Connection</legend>
            <label for="user">Nom d'utilisateur:  </label><input class="form" type="text" name="mail" id="user" required placeholder=""/> <br /> <br />
            <label for="pass">Mot de passe:  </label><input class="form" type="password" name="password" id="pass" required /> <br /> <br />
            <input type="submit" value="Se Connecter" />
            <?php
            if(isset($failed)) {
                if($failed == 1) {
                    echo("<p>Mauvais mot de passe !</p>");
                }
            }
            ?>
        </fieldset>
    </form>
    </body>
</html>