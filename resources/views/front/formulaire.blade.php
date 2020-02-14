@extends('layout')

@section('content')
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-lg-4"></div>
        <div class="col-xs-5 col-sm-5 col-lg-5 text-center">
            <div class="row">
            <fieldset>
                    <legend>Inscription</legend>
                    <form class="form-inline" method="POST" action="/register">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="nom">Nom : </label>
                        </div>
                            <input class="form form-control" id="nom" type="text" name="last_name" placeholder="Nom" required> <br/> <br/>
                        <div class="col-xs-12">
                            <label for="prenom">Prénom : </label>
                        </div>
                            <input class="form form-control" id="prenom" type="text" name="first_name" placeholder="Prenom" required> <br/> <br/>
                        <div class="col-xs-12">
                            <label for="pseudo">Pseudo : </label>
                        </div>
                            <input class="form form-control" id="pseudo" type="text" name="user" placeholder="Pseudo" required> <br/> <br/>
                        <div class="col-xs-12">
                            <label for="email">Adresse mail : </label>
                        </div>
                            <input class="form form-control" id="email" type="text" name="mail" placeholder="exemple@gmail.com" required><br/> <br/>
                        <div class="col-xs-12"> 
                            <label for="pass">Mot de passe : </label>
                        </div>
                            <input class="form form-control" id="password" type="password" required name="pass" placeholder="Mot de passe" /> <br/> <br/>
                            <input class="btn btn-primary" type="submit" value="S'inscrire" />
                        </div>
                    </form>
            </fieldset>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-lg-4"></div>
    </div>
@endsection    