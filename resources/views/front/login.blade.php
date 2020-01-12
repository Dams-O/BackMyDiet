<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="css/forms.css" />
        <title>MyDiet - Connection</title>
    </head>
    <body>
    <form method="POST" action="auth">
        {{ csrf_field() }}
        <fieldset class="formCont"> 
            <legend>Connection</legend>
            <label for="user">Adresse mail:  </label><input class="form" type="email" name="mail" id="user" required placeholder="exemple@gmail.com"/> <br /> <br />
            <label for="pass">Mot de passe:  </label><input class="form" type="password" name="password" id="pass" required /> <br /> <br />
            <input class="submit" type="submit" value="Se Connecter" />
            <?php
            if(isset($failed)) {
                if($failed == 1) {
                    echo("<p class='alert'>Mauvais mot de passe !</p>");
                }
            }
            if(isset($sucess)) {
                if($sucess == 1) {
                    echo("<p class='alert'>Inscription réussie ! Veuillez vous connecter</p>");
                }
            }
            ?>
        </fieldset>
    </form>
    </body>
</html>