@extends('layout.layout')


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
        background: url(img/profil/fond.jpg) no-repeat center;
        background-size: 100%;
        background-position: 50% 10%;
        color: white;
        overflow-x: hidden;
    }
    img#logo { width: 100px; }
    .profil_volet img{
        width: 60%;
        height: auto;
        position: absolute;
        z-index: 99;
        left: 38%;
    }

    .profil_mainContain {
        padding-left: 2%;
        width: 50%;
    }

    span.profil_volet-title {
        z-index: 150;
        cursor: pointer;
        font-family: Montserrat-Reg;
        color: red;
        font-size: 20px;
    }

    .profil_sixPast img, .profil_onePast img {
        opacity: 0.1;
    }

    .profil_volet-title-container {
        left:36%;
        position: absolute;
        margin-top: 20px; 
        width: 760px;
        font-size: 20px;
    }

    .profil_userImg {
        background: url(img/defUserPic.jpg) center no-repeat;
        background-size: 100%;
        width: 200px;
        height: 200px;
        border-radius: 80px;

    }

    .profil_theUser {
        font-family: Montserrat-Reg;
        font-size: 40px;
    }

    #profil_userName {
        font-family: Montserrat-Bold;
        position: absolute;
        margin-top: -60px;
    }

    .profil_name {
        margin: 80px 0 0 0;
    }

    .profil_infos {
        padding-left: 50px;
        flex-wrap: nowrap;
    }

    .profil_accountInfo {
        font-size: 30px;
    }

    #profil_lvl {
        font-size: 20px;
    }

    .profil_volet-content {
        position: absolute;
    }

    .profil_volet-content {
        width: 800px;
        height: 100%;
        padding-top: 35px;
        z-index: 100;
    }
    .profil_followContain {
        font-family: Montserrat-Reg;
        margin-top: 20px;
        margin-bottom: 180px;
    }
    #profil_continueImg{
        width: 50px;
    }

    div#profil_textBtn a {
        margin-left: 20px;
    }

    .profil_statusCheck {
        width: 30px;
    }

    #profil_lvl {
        margin-left: 40px; 
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