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
        background: url(img/profil/fond.jpg) no-repeat center;
        background-size: 100%;
        background-position: 50% 10%;
        color: white;
    }
    img#logo { width: 100px; }
    .volet img{
        width: 800px;
        position: absolute;
        z-index: 99;
    }

    .mainContain {
        width: 50%;
        padding-left: 20%;
    }

    span.volet-title {
        z-index: 150;
        cursor: pointer;
        font-family: Montserrat-Reg;
        color: red;
        font-size: 20px;
    }

    .sixPast img, .onePast img {
        opacity: 0.1;
    }

    .volet-title-container {
        position: absolute;
        margin-top: 20px; 
        width: 760px;
    }

    .userImg {
        background: url(img/defUserPic.jpg) center no-repeat;
        background-size: 100%;
        width: 200px;
        height: 200px;
        border: solid black 1px;
        border-radius: 80px;
    }

    .theUser {
        font-family: Montserrat-Reg;
        font-size: 40px;
    }

    #userName {
        font-family: Montserrat-Bold;
        position: absolute;
        margin-top: -60px;
    }

    .name {
        margin: 80px 0 0 0;
    }

    .infos {
        padding-left: 50px;
        flex-wrap: nowrap;
    }

    .accountInfo {
        font-size: 30px;
    }

    #lvl {
        font-size: 20px;
    }

    .volet-content {
        position: absolute;
    }

    .volet-content {
        width: 800px;
        height: 100%;
        padding-top: 35px;
        z-index: 100;
    }
    .followContain {
        font-family: Montserrat-Reg;
        margin-top: 20px;
        margin-bottom: 180px;
    }
    #continueImg{
        width: 50px;
    }

    div#textBtn a {
        margin-left: 20px;
    }

    .statusCheck {
        width: 30px;
    }

    #lvl {
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

<div class="mainContain">
    <div class="profilContent d-flex justify-content-center justify-content-between">
        <div class="profContain userInfo d-flex flex-column">
            <div class="name">
                <div class="theUser d-flex align-items-end">
                    <div class="userImg">
                    </div>
                    <div class="infos d-flex flex-column">
                        <span id="userName"><?php echo $user->first_name . ' ' . $user->last_name ?></span>
                        <span id="pseudo"><?php echo $user->pseudo ?></span>
                        <span id="age">50 ans</span>
                    </div>
                </div>
                <div class="accountInfo">
                    <span id="email"><?php echo $user->mail ?></span>
                    <div class="followContain d-flex flex-column">
                        <img src="" alt="" />
                        <div id="followStatus">
                            <img class="statusCheck" style="display: none" src="{{URL::asset('img/profil/off.png')}}" alt="" />
                            <img class="statusCheck" src="{{URL::asset('img/profil/on.png')}}" alt="" />
                            <span>Abonné</span>
                        </div>
                        <span id="lvl">Novice</span>
                    </div>
                    <div id="textBtn">
                        <span>Modifier le menu type</span>
                        <a href="menuType"><img id="continueImg" src="{{URL::asset('img/profil/continue.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="profContain diagram">
            <div class="volet-title-container d-flex justify-content-around">
                <span class="volet-title bgVolet1">Les 6 derniers mois</span>
                <span class="volet-title bgVolet2">Le mois dernier</span>
                <span class="volet-title bgVolet3">Ce mois-ci</span>
            </div>
            <div class="volet-content">
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
            <div class="volet sixPast">
                <img class="bgVolet firstVolet" src="{{URL::asset('img/profil/gauche.png')}}" alt="" />
                
            </div>
            <div class="volet onePast">
                <img class="bgVolet middleVolet" src="{{URL::asset('img/profil/milieu.png')}}" alt="" />
                
            </div>
            <div class="volet thisMonth">
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