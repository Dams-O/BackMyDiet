<!-- Stored in resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('metaDescription')">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">  
        <link href="{{URL::asset('assets/front/bower_components/bootstrap/dist/css/style.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <script src="{{URL::asset('js/jquery-3.4.1.min.js')}}"></script>
        <link href="{{URL::asset('css/login.css')}}" rel="stylesheet"> 
        <link rel="stylesheet" href="{{URL::asset('css/addRecette.css')}}" />
        <title>My Diet</title>
    </head>
    <body>
        
            @yield('content')
    
        @yield('custom-js')
        <script src="{{URL::asset('js/loading.js')}}"></script>
    </body>
</html>