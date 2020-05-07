@extends('layout')


@section('content')

<style>
    @font-face{
      font-family: "Montserrat-Reg";
      src: url(../fonts/Montserrat-Regular.ttf);
    }

    @font-face{
      font-family: "Montserrat-Bold";
      src: url(../fonts/Montserrat-Bold.ttf);
    }
    
    body{
        background: url(../img/addrecette/fond.jpg) no-repeat center;
        background-position: 50% 60%;
        background-size: 1000px;
        background-color: #D4AFA7;
    }

    .input-title {
    font-family: Montserrat-Bold;
    color: white;
}

.nav-link {
    font-family: Montserrat-Reg;

}

input, textarea {
    margin-top: 5px;
    outline: none;
}

input.little{
    background:url(../img/background-input-little.png) no-repeat center;
    background-color: transparent;
    background-size: 340px;
    color: black;
    text-decoration: none;
    border: none;
    width: 340px;
    height: 30px;
    padding-left: 20px;
    padding-right: 20px;
}

input.normal{
    background:url(../img/background-input.png) no-repeat left center;
    background-color: transparent;
    background-size: 340px;
    color: black;
    text-decoration: none;
    border: none;
    width: 340px;
    height: 30px;
    padding-left: 20px;
    padding-right: 20px;
}


img#logo{
    width: 100px;
}

.hidden-radio {
    display: none;
}

.select{
    display: none;
}

img.type{
    width: 100px;
}

textarea#steps {
    background:url(../img/background-input-area.png) no-repeat center;
    background-color: transparent;
    background-size: 457px;
    color: black;
    text-decoration: none;
    border: none;
    padding: 10px;
    width: 450px;
    height: 159px;
    resize: none;
}

</style>
    <div id="headerWrap">
        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1"><img id="logo" src="{{URL::asset('img/logo-master.png')}}">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="addRecette">Créer une recette</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="addFood">Ajout d'aliment</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="pageContent">
        <div class="container">
                <div class="text-center col-xs-12 col-sm-12 col-lg-12">
                    <form action="addRecetteForm" method="POST">
                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Quelle recette ?</span> <br />
                                <input id="recipe" class="normal" type="text" required name="recipeName" />
                            </div>
                        </div>

                        <label for="egg"><img class="type unselect" src="{{URL::asset('img/addrecette/type/unselected/oeuf.png')}}" /><img class="type select" src="{{URL::asset('img/addrecette/type/selected/selected_egg.png')}}" /></label>
                        <label for="apple"><img class="type unselect" src="{{URL::asset('img/addrecette/type/unselected/pomme.png')}}" /><img class="type select" src="{{URL::asset('img/addrecette/type/selected/selected_pomme.png')}}" /></label>
                        <label for="ble"><img class="type unselect" src="{{URL::asset('img/addrecette/type/unselected/ble.png')}}" /><img class="type select" src="{{URL::asset('img/addrecette/type/selected/selected_ble.png')}}" /></label>
                        <label for="yaourt"><img class="type unselect" src="{{URL::asset('img/addrecette/type/unselected/yaourt.png')}}" /><img class="type select" src="{{URL::asset('img/addrecette/type/selected/selected_yart.png')}}" /></label>
                        <label for="choco"><img class="type unselect" src="{{URL::asset('img/addrecette/type/unselected/chocolat.png')}}" /><img class="type select" src="{{URL::asset('img/addrecette/type/selected/selected_choc.png')}}" /></label>
                        <label for="huile"><img class="type unselect" src="{{URL::asset('img/addrecette/type/unselected/huile.png')}}" /><img class="type select" src="{{URL::asset('img/addrecette/type/selected/selected_oil.png')}}" /></label>
                        
                        <input class="hidden-radio" id="egg" type="radio" name="type" value="crudit" required />
                        <input class="hidden-radio" id="apple" type="radio" name="type" value="fruit" required />
                        <input class="hidden-radio" id="ble" type="radio" name="type" value="feculent" required />
                        <input class="hidden-radio" id="yaourt" type="radio" name="type" value="laitier" required />
                        <input class="hidden-radio" id="choco" type="radio" name="type" value="sucré" required />
                        <input class="hidden-radio" id="huile" type="radio" name="type" value="graisse" required />
                        

                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Quels hashtags ?</span><br />
                        <input id="hashtag" class="normal" type="text" required name="recetteHashtag" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Quels aliments associés ?</span> <br />
                                <input id="aliments" class="normal" type="text" required name="recetteAliments" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Temps de préparation</span><br />
                                <input id="prepTime" class="little" type="text" required name="recettePrepareTime" />
                            </div>
                            <div class="col">
                                <span class="input-title">Temps de cuisson</span><br />
                                <input id="cookTime" class="little" type="text" required name="recetteCookingTime" /> <br />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Les étapes de la recette</span> <br />
                                <textarea id="steps" name="recettteSteps"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="type" />
                        <input type="image" width="100" value="submit" src="{{URL::asset('img/addrecette/check-blue.png')}}" alt="submit Button" />
                    </form>
               
                
                </div>
        </div>
    </div>
<script src="{{URL::asset('js/type-select.js')}}"></script>
@endsection