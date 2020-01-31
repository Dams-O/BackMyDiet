@extends('layout')

@section('content')
<div class="container">
    <div class="row pt-5">
        <div class="col-xs-4 col-sm-4 col-lg-4"></div>
        <div class="text-center col-xs-5 col-sm-5 col-lg-5">
            <form method="POST" action="auth" class="form">
                {{ csrf_field() }}
                <fieldset class="formCont"> 
                    <legend>Connection</legend>
                        <div class="formContainer">
                            <label for="user">Adresse mail:  </label>
                            <input class="form form-control input" type="email" name="mail" id="email" required placeholder="exemple@gmail.com"/> <br /> <br />
                            <label for="pass">Mot de passe:  </label>
                            <input class="form form-control input" type="password" name="password" id="password" required /> <br /> <br />
                            <button class="btn btn-primary submit"><span class="buttonText">Se Connecter</span>
                                <div class="spinner-border load" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </button>
                        </div>           
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
            <a class="register" href="form">Pas encore inscrit ?</a> 
        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5"></div>
    </div>
</div>
@endsection