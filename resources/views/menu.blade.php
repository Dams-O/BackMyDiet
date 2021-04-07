@extends('layout.layout')

@section('custom_css')
    <link rel="stylesheet" href="{{URL::asset("css/pages/menu.css")}}" />
@endsection

@include('layout.header_layout')

@section('content')
<div id="overlay"></div>
<div class="content">   
    <form id="menu_form" class="text-center" autocomplete="on" method="GET">
        <div class="vignettes d-inline-flex flex-row justify-content-center flex-wrap">
            <div class="background1 criteres d-flex flex-column">
                <span id="critTitle">Selon vous</span>
                <div><span>Critère 1</span><label class="critLbl" for="crit1"><img src="{{URL::asset('img/login/offCheck.png')}}" /><img style="display: none" src="{{URL::asset('img/login/onCheck.png') }}" /></label><input id="crit1" type="checkbox" class="check" name="critere" value="crit1" /></div> 
                <div><span>Critère 2</span><label class="critLbl" for="crit2"><img src="{{URL::asset('img/login/offCheck.png')}}" /><img style="display: none" src="{{URL::asset('img/login/onCheck.png') }}" /></label><input id="crit2" type="checkbox" class="check" name="critere" value="crit2" /></div> 
                <div><span>Critère 3</span><label class="critLbl" for="crit3"><img src="{{URL::asset('img/login/offCheck.png')}}" /><img style="display: none" src="{{URL::asset('img/login/onCheck.png') }}" /></label><input id="crit3" type="checkbox" class="check" name="critere" value="crit3" /></div> 
                <div><span>Critère 4</span><label class="critLbl" for="crit4"><img src="{{URL::asset('img/login/offCheck.png')}}" /><img style="display: none" src="{{URL::asset('img/login/onCheck.png') }}" /></label><input id="crit4" type="checkbox" class="check" name="critere" value="crit4" /></div> 
                <div><span>Critère 5</span><label class="critLbl" for="crit5"><img src="{{URL::asset('img/login/offCheck.png')}}" /><img style="display: none" src="{{URL::asset('img/login/onCheck.png') }}" /></label><input id="crit5" type="checkbox" class="check" name="critere" value="crit5" /></div> 
                <div><span>Critère 6</span><label class="critLbl" for="crit6"><img src="{{URL::asset('img/login/offCheck.png')}}" /><img style="display: none" src="{{URL::asset('img/login/onCheck.png') }}" /></label><input id="crit6" type="checkbox" class="check" name="critere" value="crit6" /></div> 
            </div>

            <div class="background1 foodAdd d-flex flex-row flex-wrap justify-content-center">
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
             <input id="envoyer_input" value="Envoyer" onclick="pop_up()">
           
        </div>
    </form>
    
</div>

<script>
    var one_pop_only = 0
    function pop_up(){
        if (one_pop_only == 0){
            one_pop_only++
            pop = document.createElement('div');
            pop.className += 'popup';
            pop.id += 'remove_me'
            document.getElementById('overlay').style.display = 'flex';
            pop.innerHTML = '<div id="pop_organiser"><p>Success !</p><div onclick=pop_up() id="cross"></div></div> ';
            document.getElementById('overlay').appendChild(pop)
        } else if(one_pop_only == 1){
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('remove_me').remove()
            document.forms[0].submit()
            one_pop_only--
        }


    }   
    
</script>
<script src="{{URL::asset('js/checkbox.js')}}" ></script>


@endsection