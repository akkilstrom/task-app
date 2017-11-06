<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <!-- favicons -->
        {{--  <link rel="icon" href="../../../../favicon.ico">  --}}

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>The Company Forum</title>

        <!-- Bootstrap core CSS -->
        {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">  --}}

        <!-- Custom styles for this template -->
        <link href="{{ url('/') }}/css/app.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <div class="blog-masthead">
                <div class="container">
                    <nav class="nav">
                        <a class="nav-link active" href="#">Home</a>
                        <a class="nav-link" href="#">New features</a>
                        <a class="nav-link" href="#">Press</a>
                        <a class="nav-link" href="#">New hires</a>
                        <a class="nav-link" href="#">About</a>
                        @guest
                            <a class="nav-link ml-auto" href="{{ route('login') }}">Login</a>
                            <a class="nav-link ml-auto" href="{{ route('register') }}">Register</a>
                        @else
                            <a class="nav-link ml-auto" href="#">
                                {{ Auth::user()->name }} 
                            </a>
                                
                            <a class="nav-link ml-auto" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>  
                        @endguest
                    </nav>
                </div>
            </div>

            <div class="blog-header">
                <div class="container">
                    <h1 class="blog-title">The Company forum</h1>
                    <p class="lead blog-description">Here you find contact details 
                        of your colleagues and task board.
                    </p>
                </div>
            </div>
        </header>
