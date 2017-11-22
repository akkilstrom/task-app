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

        <title>The Taskboard</title>
        <!-- Bootstrap core CSS -->
        {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">  --}}
        <!-- Custom styles for this template -->
        
        <link href="{{ url('/') }}/css/app.css" rel="stylesheet">
    </head>

    <body>
        @guest
            <a class="nav-item" href="{{ route('login') }}">
                <i class="fa fa-sign-in" aria-hidden="true"></i><br>
                Login
            </a>
            <a class="nav-item" href="{{ route('register') }}">
                <i class="fa fa-user-plus" aria-hidden="true"></i><br>
                Register
            </a>
        @else
            <header>
                <div class="header-content">
                    <div class="logo-container">
                        <h1 class="logo">The Taskboard</h1>
                    </div>
                    <nav class="nav">
                        <a class="nav-item active" href="/home">
                            {{-- <i class="fa fa-home" aria-hidden="true"></i><br> --}}
                            <img class="icon" src="https://icongr.am/clarity/home.svg?size=40&color=ffffff" alt="home"><br>
                            Dashboard
                        </a>
                        <a class="nav-item" href="/projects">
                            {{-- <i class="fa fa-database" aria-hidden="true"></i> --}}
                            <img class="icon" src="https://icongr.am/clarity/tasks.svg?size=40&color=ffffff" alt="projects"><br>
                            Projects
                        </a>
                        <a class="nav-item" href="/clients">
                            {{-- <i class="fa fa-table" aria-hidden="true"></i><br> --}}
                            <img class="icon" src="https://icongr.am/clarity/users.svg?size=40&color=ffffff" alt="clients"><br>
                            Clients
                        </a>
                        {{--  <a class="nav-link ml-auto" href="#">
                            {{ Auth::user()->name }} 
                        </a>  --}}
                        <a class="nav-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{-- <i class="fa fa-sign-out" aria-hidden="true"></i><br> --}}
                            <img class="icon" src="https://icongr.am/clarity/logout.svg?size=40&color=ffffff" alt="logout"><br>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>  
                    </nav>
                </div><!-- /.header-content -->
            </header>
        @endguest
