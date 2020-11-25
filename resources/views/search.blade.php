@extends('layout.layout')

@section('custom_css')
<link rel="stylesheet" href="{{URL::asset('css/search.css')}}">
@endsection


@section('content')

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

<div class="content d-flex flex-column align-items-center text-center">
    <span class="search_Title">Vous cherchez quelqu'un ?</span><br />
    <div class="search_formContain">
        <input id="search_Field" type="text" />
        <form class="search_Result text-center" method="GET" action="#">
            <div class="d-inline-flex justify-content-center form-group">
                <ul class="search_resultList">
                    <li>
                        <span class="pseudo">Pseudo</span>
                        <span class="name">John Doe</span>
                        <span class="email">adressemail@gmail.com</span>
                        <label class="mailSelect" for="mailCheckbox1">
                            <img src="{{URL::asset('img/search/off.png')}}" />
                            <img style="display: none" src="{{URL::asset('img/search/on.png') }}" />
                        </label>
                        <input id="mailCheckbox1" type="checkbox" class="check" name="searchedMail" value="mail1" />
                    </li>
                    <li>
                        <span class="pseudo">Pseudo</span>
                        <span class="name">John Doe</span>
                        <span class="email">adressemail@gmail.com</span>
                        <label class="mailSelect" for="mailCheckbox2">
                            <img src="{{URL::asset('img/search/off.png')}}" />
                            <img style="display: none" src="{{URL::asset('img/search/on.png') }}" />
                        </label>
                        <input id="mailCheckbox2" type="checkbox" class="check" name="searchedMail" value="mail2" />
                    </li>
                    <li>
                        <span class="pseudo">Pseudo</span>
                        <span class="name">John Doe</span>
                        <span class="email">adressemail@gmail.com</span>
                        <label class="mailSelect" for="mailCheckbox3">
                            <img src="{{URL::asset('img/search/off.png')}}" />
                            <img style="display: none" src="{{URL::asset('img/search/on.png') }}" />
                        </label>
                        <input id="mailCheckbox3" type="checkbox" class="check" name="searchedMail" value="mail3" />
                    </li>
                    <li>
                        <span class="pseudo">Pseudo</span>
                        <span class="name">John Doe</span>
                        <span class="email">adressemail@gmail.com</span>
                        <label class="mailSelect" for="mailCheckbox4">
                            <img src="{{URL::asset('img/search/off.png')}}" />
                            <img style="display: none" src="{{URL::asset('img/search/on.png') }}" />
                        </label>
                        <input id="mailCheckbox4" type="checkbox" class="check" name="searchedMail" value="mail4" />
                    </li>
                    <li>
                        <span class="pseudo">Pseudo</span>
                        <span class="name">John Doe</span>
                        <span class="email">adressemail@gmail.com</span>
                        <label class="mailSelect" for="mailCheckbox5">
                            <img src="{{URL::asset('img/search/off.png')}}" />
                            <img style="display: none" src="{{URL::asset('img/search/on.png') }}" />
                        </label>
                        <input id="mailCheckbox5" type="checkbox" class="check" name="searchedMail" value="mail5" />
                    </li>
                    <li>
                        <span class="pseudo">Pseudo</span>
                        <span class="name">John Doe</span>
                        <span class="email">adressemail@gmail.com</span>
                        <label class="mailSelect" for="mailCheckbox6">
                            <img src="{{URL::asset('img/search/off.png')}}" />
                            <img style="display: none" src="{{URL::asset('img/search/on.png') }}" />
                        </label>
                        <input id="mailCheckbox6" type="checkbox" class="check" name="searchedMail" value="mail6" />
                    </li>
                    <li>
                        <span class="pseudo">Pseudo</span>
                        <span class="name">John Doe</span>
                        <span class="email">adressemail@gmail.com</span>
                        <label class="mailSelect" for="mailCheckbox7">
                            <img src="{{URL::asset('img/search/off.png')}}" />
                            <img style="display: none" src="{{URL::asset('img/search/on.png') }}" />
                        </label>
                        <input id="mailCheckbox7" type="checkbox" class="check" name="searchedMail" value="mail7" />
                    </li>
                    <li>
                        <span class="pseudo">Pseudo</span>
                        <span class="name">John Doe</span>
                        <span class="email">adressemail@gmail.com</span>
                        <label class="mailSelect" for="mailCheckbox8">
                            <img src="{{URL::asset('img/search/off.png')}}" />
                            <img style="display: none" src="{{URL::asset('img/search/on.png') }}" />
                        </label>
                        <input id="mailCheckbox8" type="checkbox" class="check" name="searchedMail" value="mail8" />
                    </li>
                </ul>
            </div>
    </form>
    </div>
</div>
<script>
    $("input[type='checkbox']").change(function(clicked){
        let theLabel = clicked.currentTarget.labels;
        let theCheckbox = theLabel[0].control;
        let first = theLabel[0].children[0];
        let last = theLabel[0].children[1];
        if($(theCheckbox).prop("checked") == true) {
            $(first).hide();
            $(last).show();
        } else {
            $(last).hide();
            $(first).show();
        }
    });
</script>
@endsection