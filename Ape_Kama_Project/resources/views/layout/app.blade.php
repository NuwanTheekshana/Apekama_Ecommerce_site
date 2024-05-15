<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ApeKama Online</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="{{ asset('img/logo.png') }}" rel="icon">
        

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('lib/slick/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/slick/slick-theme.css') }}" rel="stylesheet">
        
        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>

    <body>

        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        apekama.online@gmail.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        011-245-6789
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="{{url('/')}}" class="nav-item nav-link active">Home</a>
                            {{-- <a href="product-list.html" class="nav-item nav-link">Products</a> --}}
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Products</a>
                                <div class="dropdown-menu">
                                    <a href="{{url('best_selling')}}" class="dropdown-item">Best Selling</a>
                                    <a href="{{url('New_arrivals')}}" class="dropdown-item">New Arrivals</a>
                                    <a href="{{url('women_category')}}" class="dropdown-item">Women</a>
                                    <a href="{{url('men_category')}}" class="dropdown-item">Men</a>
                                    <a href="{{url('kids_category')}}" class="dropdown-item">Kids & Babies Clothes</a>
                                    <a href="{{url('homeLife_category')}}" class="dropdown-item">Home & Life Styles</a>
                                </div>
                            </div>
                            <a href="{{url('/about_us')}}" class="nav-item nav-link">About Us</a>
                            <a href="{{url('/addtocartpage')}}" class="nav-item nav-link">Cart</a>
                            <a href="{{url('/my_account')}}" class="nav-item nav-link">My Account</a>
                            <a href="{{url('/contact')}}" class="nav-item nav-link">Contact Us</a>
                            
                        </div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <!-- Authentication Links -->
                                @guest
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                                <div class="dropdown-menu">
                                    @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                                    @endif
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                                    @endif
                                </div>
                                @else

                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                    </a>
                
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>
                                </div>
                                @endguest

                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->   

         <!-- Bottom Bar Start -->
 <div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                @guest

                <div class="search">
                    <form action="{{route('search_form_gust')}}" method="POST">
                        @csrf
                        <input type="text" id="search_input" name="search_input" placeholder="Search">
                    <button type="submit"><i class="fa fa-search" style="color: #857327;"></i></button>
                    </form>
                    
                </div>

                @else

                <div class="search">
                    <form action="{{route('search_form')}}" method="POST">
                        @csrf
                        <input type="text" id="search_input" name="search_input" placeholder="Search">
                    <button type="submit"><i class="fa fa-search" style="color: #857327;"></i></button>
                    </form>
                    
                </div>

                @endguest
                
            </div>
            <div class="col-md-3">
                <div class="user">
                   
                    @guest
                    <a href="{{route('favourite_page')}}" class="btn wishlist">
                        <i class="fa fa-heart" style="color: #857327;"></i>
                        <span id="fav_count">(0)</span>
                    </a>

                    <a href="cart.html" class="btn cart">
                        <i class="fa fa-shopping-cart" style="color: #857327;"></i>
                        <span>(0)</span>
                    </a>
                    @else
                    <a href="{{route('favourite_page')}}" class="btn wishlist">
                        <i class="fa fa-heart" style="color: #857327;"></i>
                        <span id="fav_count">({{$fav_count}})</span>
                    </a>
                    <a href="{{url('/addtocartpage')}}" class="btn cart">
                        <i class="fa fa-shopping-cart" style="color: #857327;"></i>
                        <span id="itm_count">({{$addtocart_count}})</span>
                    </a>
                    @endguest
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End --> 
