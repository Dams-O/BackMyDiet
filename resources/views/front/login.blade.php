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
                    padding: 50px;
                    background: url(../img/login/forme.png) no-repeat right center;
                    background-size: 500px;
                    background-position: 100% 0%;
                }

                input{
                    outline: none
                }

                input.big {
                    color: black;
                    text-decoration: none;
                    border: none;
                    width: 500px;
                    height: 50px;
                    margin-bottom: 10px;
                    padding-left: 50px;
                }

                input.mail{
                    background:url(../img/login/email-icon.png), url(../img/login/login-input-barre.png);
                    background-position: 5% 45%, left center;
                    background-repeat: no-repeat, no-repeat;
                    background-color: transparent;
                    background-size: 20px, 500px;
                }
                input.pass {
                    background:url(../img/login/pass-icon.png), url(../img/login/login-input-barre.png);
                    background-position: 5% 45%, left center;
                    background-repeat: no-repeat, no-repeat;
                    background-color: transparent;
                    background-size: 20px, 500px;
                }

                #loginTitle {
                    font-family: Montserrat-Bold;
                    font-size: 80px
                }

                #sub-loginTitle {
                    font-family: Montserrat-Reg;
                    font-size: 30px
                }

                #loginTitleContainer {
                   margin-bottom: 50px; 
                }

                .radioRemember {
                    font-family: Montserrat-Reg;
                    padding-left: 100px;
                    color: lightgrey;
                }

                .radioRemember > label {
                    margin-right: 10px;
                }

                .radioRemember > input {
                   display: none;
                }

                .radioRemember > label > img {
                    width: 20px;
                }

                #submitLog{
                    width: 250px;
                    height: 30px;
                    background: url(../img/login/connect-icon.png) no-repeat right center;
                    background-size: 40px;
                    font-family: Montserrat-Bold;
                    font-size: 20px;
                    border: none;
                    background-color: transparent;
                    padding: 0;
                }

                #forgetLink {
                    color: lightgrey;
                    text-decoration: none;
                }
            </style>

            <div id="loginTitleContainer">
                <span id="loginTitle">Bonjour</span><br />
                <span id="sub-loginTitle">Tu peux te connecter</span>
            </div>
            <form autocomplete="off" class="text-center"method="POST" action="auth"> 
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
           
            <?php
                if(isset($failed)) {
                    if($failed == 1) {
                        echo("<p class='alert'>Informations erronées !</p>");
                    }
                }
                if(isset($sucess)) {
                    if($sucess == 1) {
                        echo("<p class='alert'>Inscription réussie ! Veuillez vous connecter</p>");
                    }
                }
            ?> 
<!--             
<script src="{{URL::asset('js/stay-login.js')}}"></script> -->
@endsection