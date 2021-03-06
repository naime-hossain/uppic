<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="/images/laravel-icon.png" type="image" sizes="16x16">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Uppic') }}</title>
     
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
</head>
<body>
 <div id="preloader">
        <div id="status">
            &nbsp;
        </div>
    </div>
    <div id="app">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand fa fa-3x" href="{{ url('/') }}">
                        {{ config('app.name', 'LaraUppic') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                             @php
                                $url=url()->current();
                             @endphp
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                         <li class="{{ $url==route('home')?'active':'' }}"><a href="{{route('home')}}" title="">home</a></li>
                        @if (Auth::check())
                                 <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                             
                                         <li><a href="{{ route('user.show',Auth::user()->id) }}" title="">Profile</a></li>
                                         <li><a href="{{ route('user.images') }}" title="">Upload</a></li>
                                         
                                       
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                     </li>
                                </ul>
                            </li>
                           {{--  <li><a href="/home" title="">home</a></li> --}}


                         
                                
                         


                        @else
                        <li class="{{ $url==route('login')?'active':'' }}"><a href="{{ route('login') }}">Login</a></li>
                        <li class="{{ $url==route('register')?'active':'' }}"><a href="{{ route('register') }}">Register</a></li>
                        
                        @endif


                    </ul>
                </div>
            </div>
        </nav>
        </div>