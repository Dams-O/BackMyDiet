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
        background: url(../img/addFood/fond.jpg) no-repeat center;
        background-position: 50% 50%;
        background-size: 1950px;
        background-color: #D4AFA7;
        font-family: Montserrat-Bold;
    }

    span.input-title {
      font-size: 30px 
    
    }

    input.big{
      background:url(../img/background-input.png) no-repeat left center;
      background-color: transparent;
      background-size: 500px;
      color: black;
      text-decoration: none;
      border: none;
      width: 500px;
      height: 60px;
      padding-left: 20px;
      padding-right: 25px;
    }

    .foodFormContainer {
      margin-top: 200px; 
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

    input {
      outline: none;
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
        <div class="container">
            <div class="foodFormContainer">
              <form class="text-center" action="addFoodForm" method="POST">
                  <div class="form-group">
                      <span class="input-title">On ajoute quoi ?</span> <br />
                      <input id="food" class="big" type="text" required name="foodName" />
                  </div>
                  <div class="form-group">
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
                  </div>
                  <div class="form-group">
                    <input  type="image" width="100" value="submit" src="{{URL::asset('img/addFood/check-rose.png')}}" alt="submit Button" />
                  </div>
              </form>
          </div>
        </div>
        </div>
      </div>
  <script src="{{URL::asset('js/type-select.js')}}"></script>
  @endsection