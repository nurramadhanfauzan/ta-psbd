<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style type="text/css">
    
            body
            {
                margin: 0;
                height: 100%;
                font-size: .9rem;
                font-weight: 400;
                line-height: 1.6;
                text-align: justify;
                background-color:  ;
            }
            .navbar
            {
                box-shadow: 0 6px 12px rgba(48,48,48,.5);
            }
            .card
            {
                box-shadow: 0 2px 4px rgba(248,71,83,.5);
                padding: 10px;
            }
            .navbar-brand
            {
                font-weight: bold;
                font-size: 1.5rem;
            }
            .my-form, .login-form, .table, .h2
            {
                font-family: Raleway, sans-serif;
                font-weight: bold;
                font-size: 1rem;
                color: #;
            }
            .nav-link
            {
                font-weight: bold;
                font-size: 1rem;
                text-decoration: underline;
            }
            .my-form, .login-form
            {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }
            .my-form, .login-form, .row
            {
                margin-left: 0;
                margin-right: 0;
            }
            .table
            {
                white-space: nowrap;
                border-style: solid;
                border-width: 0px;
            }
            .image 
            {
                height: 65px;
                width: 110px;
                margin: 3px 0px 0px -6px;
                margin-right: .5rem;
            }
            img.background 
            {
                position: fixed;
                left: 0px;
                top: 0px;
                z-index: -1;
                width: 100%;
                height: 100%;
                -webkit-filter: blur(.1rem);
                filter: blur(.09rem);
            }

        </style>
        
        <title>@yield('title')</title>
    </head>
    
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#E5D9B6 ;">
            <div class="container">
            <img src="https://akamai-webcdn.kgstatic.net/gt/images/pc/logo_guardian.png" alt="logo" class="image">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @else
                       
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <img class="background" src="https://wallpaperaccess.com/full/8089070.jpg" alt="bg">
        @yield('content')
    </body>
</html>