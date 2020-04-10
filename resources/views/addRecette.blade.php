<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>MyDiet - Ajouter une recette</title>
    <meta name="twitter:image" content="assets/img/logo%20master.png">
    <meta property="og:type" content="website">
    <meta property="og:image" content="assets/img/logo%20master.png">
    <meta property="og:title" content="MyDiet">
    <meta name="twitter:card" content="summary">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/addRecette.css')}}">
    <style>
        img#logo{
            width: 100px;
        }

        textarea {
            width: 400px;
            height: 200px;
        }


    
    </style>
</head>

<body>
    <div id="headerWrap">
        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1"><img id="logo" src="{{URL::asset('img/logo-master.png')}}">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Créer une recette</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Ajout d'aliment</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="pageContent">
        <div class="container">
                <div class="text-center col-xs-12 col-sm-12 col-lg-12">
                    <form action="addForm" method="POST">
                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Quelle recette ?</span> <br />
                                <img class="input-background" src="{{URL::asset('img/background-input.png')}}" >
                                <input id="name" type="text" required name="recetteName" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Quels hashtags ?</span><br />
                        <input id="hashtag" type="text" required name="recetteHashtag" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Quels aliments associés ?</span> <br />
                                <input id="aliments" type="text" required name="recetteAliments" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Temps de préparation</span><br />
                                <input id="prepTime" type="text" required name="recettePrepareTime" />
                            </div>
                            <div class="col">
                                <span class="input-title">Temps de cuisson</span><br />
                                <input id="cookTime" type="text" required name="recetteCookingTime" /> <br />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span class="input-title">Les étapes de la recette</span> <br />
                                <textarea id="steps" name="recettteSteps"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="type" />
                    </form>
                <img src="{{URL::asset('img/background-input.png')}}" >
                <div class="image-upload">
                    <label for="file-input">
                        <img src="{{URL::asset('img/background-input.png')}}"/>
                    </label>
                
                    <input id="file-input" type="text"/>
                </div>
                <div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>