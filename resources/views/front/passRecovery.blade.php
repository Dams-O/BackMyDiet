@extends('layout.layout')

@section('custom_css')
<link rel="stylesheet" href="{{URL::asset("css/passRecovery.css")}}" />   
@endsection

@section('content')
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