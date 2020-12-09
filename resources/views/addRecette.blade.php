@extends('layout.layout')

@section('custom_css')
    <link rel="stylesheet" href="{{ URL::asset("css/pages/addRecette.css")}}" />
@endsection
@include('layout.header_layout')
@section('content')
   
    <div id="pageContent">
        <div class="container">
                <div class="text-center col-xs-12 col-sm-12 col-lg-12">
                    <form action="addRecetteForm" method="POST">
                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Quelle recette ?</span> <br />
                                <input id="recipe" class="normal txt_input" type="text" required name="recipeName" />
                            </div>
                        </div>

                        <label for="egg"><img class="type unselect" src="{{URL::asset('img/addrecette/type/unselected/oeuf.png')}}" /><img class="type select" src="{{URL::asset('img/addrecette/type/selected/selected_egg.png')}}" /></label>
                        <label for="apple"><img class="type unselect" src="{{URL::asset('img/addrecette/type/unselected/pomme.png')}}" /><img class="type select" src="{{URL::asset('img/addrecette/type/selected/selected_pomme.png')}}" /></label>
                        <label for="ble"><img class="type unselect" src="{{URL::asset('img/addrecette/type/unselected/ble.png')}}" /><img class="type select" src="{{URL::asset('img/addrecette/type/selected/selected_ble.png')}}" /></label>
                        <label for="yaourt"><img class="type unselect" src="{{URL::asset('img/addrecette/type/unselected/yaourt.png')}}" /><img class="type select" src="{{URL::asset('img/addrecette/type/selected/selected_yart.png')}}" /></label>
                        <label for="choco"><img class="type unselect" src="{{URL::asset('img/addrecette/type/unselected/chocolat.png')}}" /><img class="type select" src="{{URL::asset('img/addrecette/type/selected/selected_choc.png')}}" /></label>
                        <label for="huile"><img class="type unselect" src="{{URL::asset('img/addrecette/type/unselected/huile.png')}}" /><img class="type select" src="{{URL::asset('img/addrecette/type/selected/selected_oil.png')}}" /></label>
                        
                        <input class="add hidden-radio" id="egg" type="radio" name="type" value="crudit" required />
                        <input class="add hidden-radio" id="apple" type="radio" name="type" value="fruit" required />
                        <input class="add hidden-radio" id="ble" type="radio" name="type" value="feculent" required />
                        <input class="add hidden-radio" id="yaourt" type="radio" name="type" value="laitier" required />
                        <input class="add hidden-radio" id="choco" type="radio" name="type" value="sucré" required />
                        <input class="add hidden-radio" id="huile" type="radio" name="type" value="graisse" required />
                        

                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Quels hashtags ?</span><br />
                        <input id="hashtag" class="normal txt_input" type="text" required name="recetteHashtag" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Quels aliments associés ?</span> <br />
                                <input id="aliments" class="normal txt_input" type="text" required name="recetteAliments" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Temps de préparation</span><br />
                                <input id="prepTime" class="little txt_input" type="text" required name="recettePrepareTime" />
                            </div>
                            <div class="col">
                                <span class="input-title">Temps de cuisson</span><br />
                                <input id="cookTime" class="little txt_input" type="text" required name="recetteCookingTime" /> <br />
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