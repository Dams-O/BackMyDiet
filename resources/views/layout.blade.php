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
        <link href="{{URL::asset('assets/front/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/bower_components/bootstrap/dist/css/style.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/bower_components/bootstrap/dist/css/style.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        
        <title>App Name</title>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    </body>
</html>