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
                    background: url(../img/recovery/forme.png) no-repeat bottom center;
                    background-attachment: fixed;
                    background-size: 100%;
                }

                input {
                    outline: none;
                }


                input.field {
                    background:url(../img/login/email-icon.png), url(../img/login/login-input-barre.png);
                    background-position: 5% 45%, left center;
                    background-repeat: no-repeat, no-repeat;
                    background-color: transparent;
                    background-size: 20px, 500px;
                    color: black;
                    text-decoration: none;
                    border: none;
                    width: 500px;
                    height: 60px;
                    padding-left: 55px;
                    padding-right: 25px;
                    padding-bottom: 5px;
                }
            
                #recoveryTitle {
                    font-family: Montserrat-Bold;
                    font-size: 80px;
                }

                #sub-recoveryTitle {
                    font-family: Montserrat-Reg;
                    font-size: 30px;
                }

                #recoveryTitleContainer {
                   margin-bottom: 50px; 
                   padding: 50px;
                }

                #submitLog{
                    width: 250px;
                    height: 30px;
                    background: url(../img/recovery/recovery-icon.png) no-repeat bottom center;
                    background-size: 40px;
                    font-family: Montserrat-Bold;
                    font-size: 20px;
                    border: none;
                    background-color: transparent;
                    padding: 0;
                }
                
                div > span.submitText {
                    font-family: Montserrat-Bold;
                    font-size: 30px;
                }
                
            </style>

            <div id="recoveryTitleContainer">
                <span id="recoveryTitle">Un oubli ?</span><br />
                <span id="sub-recoveryTitle">On te renvoie ton mot de passe</span>
            </div>
            <form autocomplete="off" class="text-center"method="POST" action="recovery">
                <div class="form-group">                      
                    <input class="field" type="email" name="mail" id="email" required placeholder="Email"/> 
                </div>
                <div class="form-group">
                    <span class="submitText">Envoyer un nouveau</span><br />
                    <span class="submitText">mot de passe</span> <br />
                    <input id="submitLog" type="submit" value="" /> <br />  
                </div>  
            </form> 
@endsection