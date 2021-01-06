@extends('layout.layout')

@section('custom_css')
    <link rel="stylesheet" href="{{ URL::asset("css/pages/addFood.css")}}" />
@endsection

@include('layout.header_layout')

@section('content')
    <div class="container">
        <form class="form-add-food" method="POST" action="addFoodForm">
            {{ csrf_field() }}
            <span id="input-title">On ajoute quoi ?</span>
            <div class="input-bar">
                <input type="text" id="food" required name="foodName" />
                <input type="image" value="submit" src="{{URL::asset('img/addFood/check-rose.png')}}" alt="Submit" id="submit-img">
            </div>
            <div class="select-food">
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
            </div>
        </form>
    </div>
    <script src="{{URL::asset('js/type-select.js')}}"></script>
  @endsection