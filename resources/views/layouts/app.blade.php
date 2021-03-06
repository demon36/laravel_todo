<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

    <!-- Scripts -->
    <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
        form{
            display: inline;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbar">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li {{ Request::is('/') ? 'class=active' : '' }}><a href="{{ url('/') }}">Home</a></li>
                        <li {{ Request::is('trips') ? 'class=active' : '' }}><a href="{{ url('/trips') }}">trips</a></li>
                        <li class="{{ Request::is('groups') ? 'active' : '' }}">
                            <a href="{{ url('/groups') }}">
                                groups
                                @if (!Auth::guest() && Auth::user()->updated_groups > 0)
                                <span class="updated-groups badge">{{Auth::user()->updated_groups}}</span>
                                @endif
                            </a>
                            
                        </li>
                        <li {{ Request::is('demo') ? 'class=active' : '' }}><a href="{{ url('/demo') }}">demo</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DP demos <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/prototype') }}">prototype</a></li>
                                <li><a href="{{ url('/flyWeight') }}">flyWeight</a></li>
<!--                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>-->
                            </ul>
                        </li>
                    </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

<div class="container">
    <div class="title m-b-md">
      @yield('content')
    </div>
</div>
        <br/><br/>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
