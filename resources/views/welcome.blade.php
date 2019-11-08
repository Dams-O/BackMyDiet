<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>PHP Laravel web application</title>
      <link href="{{ asset('css/gradients.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>

    <body>
            
            <header>
                <nav class="website-nav">
                    <ul class="navText">
                        <li><a class="home-link" href="viewDashboard">Dashboard</a></li>
                        <li><a href="viewProfilStats/{id}">Stats</a></li>
                    </ul>

                    <ul class="userLogin">
                        <li><a href="login">Connection</a></li>
                        <li><a href="formulaire" class="home-link">Inscription</a></li>
                    </ul>

            
                </nav>
            </header>

        

            <div class="container mt-3">
                <div id="myCarousel" class="carousel slide">
                
                  <!-- Indicators -->
                  <ul class="carousel-indicators">
                    <li class="item1 active"></li>
                    <li class="item2"></li>
                    <li class="item3"></li>
                  </ul>
                  
                  <!-- The slideshow -->
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="{{ asset('img/img1.jpg') }}" alt="Los Angeles" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                      <img src="{{ asset('img/img2.jpg') }}" alt="Chicago" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                      <img src="{{ asset('img/img3.jpg') }}" alt="New York" width="1100" height="500">
                    </div>
                  </div>
                  
                </div>
            </div>
            <script src="{{ asset('js/carrousel.js')}}"></script>
              
              
              
              
        
    </body>

    

</html>
