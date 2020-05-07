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

    body { 
        background: url(img/menu/fond.jpg) no-repeat center bottom;
        background-size: 100%; 
        background-position: 50% 45%;
        background-attachment: fixed;
     }
     #critTitle {
         font-family: Montserrat-Reg;
         font-size: 20px;
         color: grey;
     }
    .foodImg { width: 100px; }
    .addButton {
        width: 30px;
        cursor: pointer;
    }
    div.inSelect input::-webkit-outer-spin-button, div.inSelect input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    div.inSelect input {
        width: 20px;
        border: none;
        outline: none;
        background-color: transparent;
        text-align: center;
        font-family: Montserrat-Bold;
    }
    .background {
        background: url(img/menu/forme.png) no-repeat bottom left;
        background-size: 100% 100%;
        width: 350px;
        height: 500px;
    }
    .criteres { margin-right: 200px; }
    .addFood { margin-left: 200px; }
    .criteres span, .criteres div { margin-top: 30px; }
    .criteres div input { display: none; }
    .criteres div > span{ margin-right: 120px; font-family: Montserrat-Reg; font-weight: bold; color: grey;}
    .criteres div  img { width: 30px; } 
    div.decal { margin-right: 50px; }
    div.content { margin-top: 100px; }
    img#logo { width: 100px; }
    input.submit{
        font-family: Montserrat-Bold;
        color: white;
        font-size: 20px;
        text-align: left;
        border: none;
        background-color: transparent;
        background: url(img/menu/check-validate.png) no-repeat right center;
        background-size: 50px; 
        background-position: 100px;
        width: 180px;
        height: 50px;
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

<div class="content">   
    <form class="text-center" autocomplete="on" method="GET">
        <div class="vignettes d-inline-flex flex-row justify-content-center flex-wrap">
            <div class="background criteres d-flex flex-column">
                <span id="critTitle">Selon vous</span>
                <div><span>Critère 1</span><label class="critLbl" for="crit1"><img src="{{URL::asset('img/login/offCheck.png')}}" /><img style="display: none" src="{{URL::asset('img/login/onCheck.png') }}" /></label><input id="crit1" type="checkbox" class="check" name="critere" value="crit1" /></div> 
                <div><span>Critère 2</span><label class="critLbl" for="crit2"><img src="{{URL::asset('img/login/offCheck.png')}}" /><img style="display: none" src="{{URL::asset('img/login/onCheck.png') }}" /></label><input id="crit2" type="checkbox" class="check" name="critere" value="crit2" /></div> 
                <div><span>Critère 3</span><label class="critLbl" for="crit3"><img src="{{URL::asset('img/login/offCheck.png')}}" /><img style="display: none" src="{{URL::asset('img/login/onCheck.png') }}" /></label><input id="crit3" type="checkbox" class="check" name="critere" value="crit3" /></div> 
                <div><span>Critère 4</span><label class="critLbl" for="crit4"><img src="{{URL::asset('img/login/offCheck.png')}}" /><img style="display: none" src="{{URL::asset('img/login/onCheck.png') }}" /></label><input id="crit4" type="checkbox" class="check" name="critere" value="crit4" /></div> 
                <div><span>Critère 5</span><label class="critLbl" for="crit5"><img src="{{URL::asset('img/login/offCheck.png')}}" /><img style="display: none" src="{{URL::asset('img/login/onCheck.png') }}" /></label><input id="crit5" type="checkbox" class="check" name="critere" value="crit5" /></div> 
                <div><span>Critère 6</span><label class="critLbl" for="crit6"><img src="{{URL::asset('img/login/offCheck.png')}}" /><img style="display: none" src="{{URL::asset('img/login/onCheck.png') }}" /></label><input id="crit6" type="checkbox" class="check" name="critere" value="crit6" /></div> 
            </div>

            <div class="background foodAdd d-flex flex-row flex-wrap justify-content-center">
                <div class="decal food-selector">
                <img class="foodImg" src="{{URL::asset('img/menu/oeuf.png')}}" alt="oeuf (proteines)" />
                    <div class="inSelect">
                        <img class="addButton moins" src="{{URL::asset('img/menu/moins_prot.png')}}" alt="logo moins" />
                        <input class="numberSelect numSel1" readonly  value="0" type="number" name="quantityProt" />
                        <img class="addButton plus" src="{{URL::asset('img/menu/plus_prot.png')}}" alt="logo plus" />
                    </div>
                </div>
                <div class="food-selector">
                    <img class="foodImg" src="{{URL::asset('img/menu/pomme.png')}}" alt="pomme (fruits)" />
                    <div class="inSelect">
                        <img class="addButton moins" src="{{URL::asset('img/menu/moins_fruit.png')}}" alt="logo moins" />
                        <input class="numberSelect numSel2" readonly  value="0" type="number" name="quantityFruit" />
                        <img class="addButton plus" src="{{URL::asset('img/menu/plus_fruit.png')}}" alt="logo plus" />
                    </div>
                </div>
                <div class="decal food-selector">
                    <img class="foodImg" src="{{URL::asset('img/menu/ble.png')}}" alt="blé (feculents)" />
                    <div class="inSelect">
                        <img class="addButton moins" src="{{URL::asset('img/menu/moins_fec.png')}}" alt="logo moins" />
                        <input class="numberSelect numSel3" readonly  value="0" type="number" name="quantityFeculent" />
                        <img class="addButton plus" src="{{URL::asset('img/menu/plus_fec.png')}}" alt="logo plus" />
                    </div>
                </div>
                <div class="food-selector">
                    <img class="foodImg" src="{{URL::asset('img/menu/yaourt.png')}}" alt="yaourt (laitages)" />
                    <div class="inSelect">
                        <img class="addButton moins" src="{{URL::asset('img/menu/moins_lait.png')}}" alt="logo moins" />
                        <input class="numberSelect numSel4" readonly  value="0" type="number" name="quantityLaitage" />
                        <img class="addButton plus" src="{{URL::asset('img/menu/plus_lait.png')}}" alt="logo plus" />
                    </div>
                </div>
                <div class="decal food-selector">
                    <img class="foodImg" src="{{URL::asset('img/menu/chocolat.png')}}" alt="chocolat (sucres)" />
                    <div class="inSelect">
                        <img class="addButton moins" src="{{URL::asset('img/menu/moins_sucre.png')}}" alt="logo moins" />
                        <input class="numberSelect numSel5" readonly  value="0" type="number" name="quantitySucre" />
                        <img class="addButton plus" src="{{URL::asset('img/menu/plus_sucre.png')}}" alt="logo plus" />
                    </div>
                </div>
                <div class="food-selector">
                    <img class="foodImg" src="{{URL::asset('img/menu/huile.png')}}" alt="huile (graisses)" />
                    <div class="inSelect">
                        <img class="addButton moins" src="{{URL::asset('img/menu/moins_gras.png')}}" alt="logo moins" />
                        <input class="numberSelect numSel6" readonly  value="0" type="number" name="quantityGraisse" />
                        <img class="addButton plus" src="{{URL::asset('img/menu/plus_gras.png')}}" alt="logo plus" />
                    </div>
                </div>
            </div>
            <input class="submit align-self-end" type="submit" />
        </div>
    </form>
</div>

<script src="{{URL::asset('js/checkbox.js')}}" ></script>


@endsection