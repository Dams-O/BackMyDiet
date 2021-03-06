@extends('layout.layout')

@section('custom_css')
<link rel="stylesheet" href="{{ URL::asset("css/pages/login.css") }}" />
@endsection

@section('content')
            <div id="loginTitleContainer">
                <span id="loginTitle">Bonjour</span><br />
                <span id="sub-loginTitle">Tu peux te connecter</span>
            </div>
            <form autocomplete="off" class="text-center" method="POST" action="{{ route('login.login') }}">
                <div class="form-group">
                    <input class="big mail" type="email" name="mail" id="email" required placeholder="Email"/>
                </div>
                <div class="form-group">
                    <input class="big pass" type="password" name="password" id="password" placeholder="Mot de Passe" required />
                </div>
                <div class="radioRemember form-group">
                <span>Rester connecté </span><label for="remember"><img src="{{URL::asset('img/login/offCheck.png')}}" /><img style="display: none" src="{{URL::asset('img/login/onCheck.png') }}" /></label><input id="remember" type="checkbox" name="remember"/>
                </div>
                {{ csrf_field() }}
                <div class="submitLogin form-group">
                    <input id="submitLog" type="submit" value="Me connecter" /> <br />
                </div>
                <a id="forgetLink" href="forget">mot de passe oublié ?</a>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<!--
<script src="{{URL::asset('js/stay-login.js')}}"></script> -->
@endsection
