@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-8 col-xs-8 col-sm-8 col-lg-6 col-xl-5 m-auto px-6 text-center">

                <fieldset>
                <legend>Inscription</legend>
                <form method="POST" action="/register">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                    <div class="col-12">
                        <label for="nom">Nom : </label> <br />
                    </div>
                    <div class="col mb-3">
                        <input class="form form-control" id="nom" type="text" name="last_name" placeholder="Nom" required>
                    </div>
    
                    <div class="col">
                        <label for="prenom">Prénom : </label> <br />
                    </div>

                    <div class="col mb-3">
                        <input class="form form-control" id="prenom" type="text" name="first_name" placeholder="Prenom" required>
                    </div>

                    <div class="col">
                        <label for="pseudo">Pseudo : </label> <br />
                    </div>
                    <div class="col mb-3">
                        <input class="form form-control" id="pseudo" type="text" name="user" placeholder="Pseudo" required>
                    </div>
                    <div class="col">
                        <label for="email">Adresse mail : </label> <br />
                    </div>
                    <div class="col mb-3">
                        <input class="form form-control" id="email" type="text" name="mail" placeholder="exemple@gmail.com" required>
                    </div>
                    <div class="col"> 
                        <label for="pass">Mot de passe : </label> <br />
                    </div>
                    <div class="col mb-4"> 
                        <input class="form form-control" id="password" type="password" required name="pass" placeholder="Mot de passe" />
                    </div>
                    <div class="col"> 
                        <input class="btn btn-primary btn-lg" type="submit" value="S'inscrire" /> <br />
                    </div>
                    </div>
                </form>
                </fieldset>

        </div>

    </div>
    </div>
</div>
@endsection    