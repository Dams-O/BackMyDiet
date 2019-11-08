@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12 center"><h1>Formulaire</h1></div>
        <div class="col-md-2">
            <form class="form-inline" method="POST" action="/setUserWeb">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input id="nom" type="text" name="nom" placeholder="Nom" required>
                    <label for="prenom">Prenom</label>
                    <input id="prenom" type="text" name="prenom" placeholder="Prenom" required>
                    <label for="email">Adresse mail</label>
                    <input id="email" type="text" name="email" placeholder="exemple@gmail.com" required>
                    <label for="pseudo">Pseudo</label>
                    <input id="pseudo" type="text" name="pseudo" placeholder="Pseudo" required>
                    <label for="affilie">Affilié ?</label>
                    <input id="affilie" type="checkbox" name="affilie" required>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div>
                    {!! Form::open(['method' => 'post', 'url' => route('signin_form'), 'id' => 'enregistrement', 'class' => 'form_login']) !!}
                      <div class="bloc_type01">
                            <p class="page_titre">Enregistrez-vous</p>
                            <p>
                                {!! Form::text('nom', '', ['class' => 'form-control', 'placeholder' => "Votre nom", 'required' => '']) !!}
                            </p>
                            <p>
                                {!! Form::text('prenom', '', ['class' => 'form-control', 'placeholder' => "Votre prenom"]) !!}
                            </p>

                            <p>
                                {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => "Votre email", 'required' => '']) !!}
                            </p>

                            <p>
                                {!! Form::password('password',array('class' => 'form-control', 'required' => 'required', 'placeholder' => 'Votre mot de passe')) !!}
                            </p>

                            <p class="form__submit">
                                <input name="submit" type="submit" class="btn btn-lg btn-primary btn-block" value="Enregistrement">
                            </p>
                      </div>
                      {!! Form::close() !!}
                </div>
            </form>
        </div>
    </div>
@endsection

@section('custom-js')
@endsection
