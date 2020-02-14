<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>MyDiet Pro</title>
      <link href="{{ asset('css/gradients.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('css/nav.css') }}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="js/vendor/vegas/vegas/vegas.min.css">
      <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
      <script src="{{ asset('js/main.js')}}"></script>
    </head>

    <body>
            <header>
                <nav class="website-nav">
                    <?php
                  
                    if (Auth::check()){
                        echo("<ul class='userLogin'>");
                        echo("<li><a href='logout'>Déconnexion</a></li>");
                        echo("</ul>");
                        echo("<ul class='navText'>");
                        echo("<li><a class='home-link' href='viewDashboard'>Dashboard</a></li>");
                        echo("<li><a href='viewProfilStats/{id}'>Stats</a></li>");
                        echo("</ul>");
                    }
                    else {
                        return view("front.login");
                    }
                    ?>
                </nav>
            </header> 
        <script src="js/vendor/vegas/vegas/vegas.min.js"></script>
    </body>
</html>
