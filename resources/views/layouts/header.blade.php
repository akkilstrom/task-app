<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Structure your project workflow with Taskboard admin">
        <meta name="author" content="">
        <!-- favicons -->
        {{--  <link rel="icon" href="../../../../favicon.ico">  --}}
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

        <title>The Taskboard admin</title>
        <!-- Custom styles for this template -->
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/clarity-icons/0.10.15/clarity-icons-lite.min.js" rel="stylesheet"> --}}
        
        <link href="{{ url('/') }}/css/app.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="header-content">
                <div class="logo-container">
                    <h1 class="logo">The Taskboard</h1>
                </div>

                @guest
                <nav class="nav-logged-out">
                    <a class="nav-item" href="{{ route('register') }}">
                        @include( 'icons.register' )
                        Register
                    </a>
                </nav>
            </div><!-- /.header-content if guest-->
        </header><!-- / if guest-->
                @else 
                <nav class="nav" role="navigation">
                    <a class="nav-item {{ $nav_dashboard or ''  }}" href="/">
                        @include( 'icons.home' )
                        <br>
                        <span class="nav-txt">Dashboard</span>
                    </a>
                    <a class="nav-item {{ $nav_projects or ''  }}" href="/projects">
                        @include( 'icons.project' )
                        <br>
                        Projects
                    </a>
                    <a class="nav-item {{ $nav_clients or ''  }}" href="/clients">
                        @include( 'icons.client' )
                        <br>
                        Clients
                    </a>
                    <a class="nav-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        @include( 'icons.logout' )
                        <br>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>  
                </nav>
            </div><!-- /.header-content -->
        </header>
    @endguest
