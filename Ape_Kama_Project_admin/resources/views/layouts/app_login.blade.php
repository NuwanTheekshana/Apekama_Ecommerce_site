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
