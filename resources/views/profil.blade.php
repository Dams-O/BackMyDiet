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
        background-color: brown;
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
                        <img src="" alt="" />
                    </div>
                    <div class="infos d-flex flex-column">
                        <span id="userName">John Doe</span>
                        <span id="pseudo">Jonny</span>
                        <span id="age">50 ans</span>
                    </div>
                </div>
                <div class="accountInfo">
                    <span id="email">adressemail@gmail.com</span>
                    <div class="followContain d-flex flex-column">
                        <img src="" alt="" />
                        <span id="followStatus">Abonné</span>
                        <span id="lvl">Novice</span>
                    </div>
                    <span id="textBtn">Modifier le menu type</span>
                </div>
            </div>
        </div>
        <div class="profContain diagram">
            <div class="volet-title-container d-flex justify-content-around">
                <span class="volet-title bgVolet">Les 6 derniers mois</span>
                <span class="volet-title bgVolet">Le mois dernier</span>
                <span class="volet-title bgVolet">Ce mois-ci</span>
            </div>
            <div class="volet-content">
                <div class="volet-content">
                    <!--Contenu page ici -->
                </div>
                <div class="volet-content">
                    <!--Contenu page ici -->
                </div>
                <div class="volet-content">
                    <!--Contenu page ici -->
                </div>
            </div>
            <div class="volet sixPast">
                <img class="bgVolet" src="{{URL::asset('img/profil/gauche.png')}}" alt="" />
                
            </div>
            <div class="volet onePast">
                <img class="bgVolet" src="{{URL::asset('img/profil/milieu.png')}}" alt="" />
                
            </div>
            <div class="volet thisMonth">
                <img class="bgVolet" src="{{URL::asset('img/profil/droite.png')}}" alt="" />
                
            </div>
        </div>
    </div>
</div>


<script>
    let titleVolet = document.querySelectorAll('.volet-title');

    $(titleVolet).click(function(clicked){
        console.log(clicked);
    });
</script>

@endsection