<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>watchkart</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
        
        <!--Bootstrap CSS-->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <!--Fontawesome-->
        <link herf="/css/fontawesome.css" rel="stylesheet" type="text/css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <!--Styles-->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        <link href="/css/styles.css" rel="stylesheet" type="text/css">
        <link href="/css/register.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        @include('layouts.nav')
        
        @if(session('message'))
        <div class="alert alert-success animate__animated animate__fadeInUp" id="#alerti">
            {{session('message')}}
        </div>
        @endif
        
        @yield('content')

        @include('layouts.footer')    

        
        <script src="/js/product.js"></script>
    </body>
</html>
