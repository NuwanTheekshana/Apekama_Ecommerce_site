<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ape Kama Admin Page') }}</title>

     <!-- Scripts -->
 
     <script src="{{ asset('js/popper.min.js') }}" defer></script>
     <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
     <script src="{{ asset('js/jquery.min.js') }}"></script>
     <script src="http://code.jquery.com/jquery-latest.js"></script>
     
     <!-- Fonts -->
     <script defer src="{{ asset('font/solid.js') }}"></script>
     <script defer src="{{ asset('font/fontawesome.js') }}"></script>
     <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Ape Kama Admin Page') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                     
                        <li class="nav-item dropdown">
                            <a id="CategoryDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Category
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="CategoryDropdown">
                                <a class="dropdown-item" href="{{url('sub_category')}}">
                                   Add Sub Category
                                </a>
                                <a class="dropdown-item" href="{{url('women_category')}}">
                                    Women Category
                                </a>
                                <a class="dropdown-item" href="{{url('men_category')}}">
                                    Men Category
                                </a>
                                <a class="dropdown-item" href="{{url('kide_category')}}">
                                    Kids & Babies Clothes Category
                                </a>
                                <a class="dropdown-item" href="{{url('home_category')}}">
                                    Home & Life Style Category
                                </a>
                                
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="contact_info_job" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Jobs
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="contact_info_job">
                                <a class="dropdown-item" href="{{route('contact_info_jobs')}}">
                                   Contact Info Jobs
                                </a>
                                <a class="dropdown-item" href="{{route('item_comments_job')}}">
                                    Customer Comments
                                 </a>
                                
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="ItemsDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Users
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ItemsDropdown">
                                <a class="dropdown-item" href="{{route('register')}}">
                                   Add Users
                                </a>
                                <a class="dropdown-item" href="{{route('find_users')}}">
                                    Find Users
                                </a>

                            </div>
                        </li>



                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname }} {{ Auth::user()->lname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('layouts.notification')
</body>
@guest

@else
@if (Auth::user()->cust_type == "Customer")
<script>
    alert("Sorry, you not allowed to access this page..!");
    window.location = "{{ route('gustlogout') }}";
</script>
@endif
@endguest


</html>
