@extends('layout.layout')

@section('custom_css')
<link rel="stylesheet" href="{{URL::asset('css/profil.css')}}"/>
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

    <div class="profil_mainContain">
        <div class="profilContent d-flex justify-content-center justify-content-between">
            <div class="profContain userInfo d-flex flex-column">
                <div class="profil_name">
                    <div class="profil_theUser d-flex align-items-end">
                        <div class="profil_userImg">
                        </div>
                        <div class="profil_infos d-flex flex-column">
                        <span id="profil_userName">{{ $user->last_name }} {{$user->first_name}}</span>
                        <span id="pseudo">{{ $user->pseudo }}</span>
                            <span id="age">50 ans</span>
                        </div>
                    </div>
                    <div class="profil_accountInfo">
                    <span id="email">{{ $user->name }}</span>
                        <div class="profil_followContain d-flex flex-column">
                            <img src="" alt="" />
                            <div id="followStatus">
                                <img class="profil_statusCheck" style="display: none" src="{{URL::asset('img/profil/off.png')}}" alt="" />
                                <img class="profil_statusCheck" src="{{URL::asset('img/profil/on.png')}}" alt="" />
                                <span>Abonné</span>
                            </div>
                            <span id="profil_lvl">Novice</span>
                        </div>
                        <div id="profil_textBtn">
                            <span>Modifier le menu type</span>
                            <a href="menuType"><img id="profil_continueImg" src="{{URL::asset('img/profil/continue.png')}}" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profContain diagram">
                <div class="profil_volet-title-container d-flex justify-content-around">
                    <span class="profil_volet-title bgVolet1">Les 6 derniers mois</span>
                    <span class="profil_volet-title bgVolet2">Le mois dernier</span>
                    <span class="profil_volet-title bgVolet3">Ce mois-ci</span>
                </div>
                <div class="profil_volet-content">
                    <div class="volet-content-1">
                        <!--Contenu page ici -->
                    </div>
                    <div class="volet-content-2">
                        <!--Contenu page ici -->
                    </div>
                    <div class="volet-content-3">
                        <!--Contenu page ici -->
                    </div>
                </div>
                <div class="profil_volet profil_sixPast">
                    <img class="bgVolet firstVolet" src="{{URL::asset('img/profil/gauche.png')}}" alt="" />
                    
                </div>
                <div class="profil_volet profil_onePast">
                    <img class="bgVolet middleVolet" src="{{URL::asset('img/profil/milieu.png')}}" alt="" />
                    
                </div>
                <div class="profil_volet thisMonth">
                    <img class="bgVolet lastVolet" src="{{URL::asset('img/profil/droite.png')}}" alt="" />
                    
                </div>
            </div>
        </div>
    </div>



<script>
    let titleVolet = document.querySelectorAll('.volet-title');
    let volets = document.querySelectorAll('.bgVolet');

    $(titleVolet).click(function(clicked){
        console.log($(clicked).attr());
    });
</script>

@endsection