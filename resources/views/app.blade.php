<?php session_start();
use Illuminate\Support\Facades\Auth;
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Hopi Steam</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-lugx-gaming.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/format.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/css/community.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/wishlist.css')}}">
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('home')}}" class="logo">
                        <img src="{{asset('storage/images/logo.jpg')}}" alt="" style="width: 170px;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <!-- <li><a href="{{ route('session') }}">Session</a></li> -->
                      <li><a href="{{ route('home') }}">Home</a></li>
                      <li><a href="{{ route('category.home') }}">Our Shop</a></li>

                      <li><a href="{{route('contact')}}">Contact Us</a></li>
                      <!-- neu chua dang nhap -->
                      @if(!Auth::check())
                        <li><a href="{{ route('signup.form') }}">Sign Up</a></li>
                        <li><a href="{{ route('signin.form') }}">Sign In</a></li>
                        @endif
                      <!-- check user login -->
                        @if(Auth::check())
                          <li><a href="{{ route('voucher.view') }}">Voucher</a></li>
                          <li>
                            <a href="{{route('show.cart')}}">
                              <!-- khi an buy thi luu session cart -->
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart 
                              <span class="badge text-bg-danger">
                                <!-- Tong So Luong San Pham Lay Tu HomeController -->
                              @if(isset($qty))
                              {{ $qty }}
                              @endif
                              </span>
                            <!-- END METHOD -->
                            </a>
                          </li>
                            <!-- check admin login -->
                            @if(Auth::user()->roles == 0)
                            <li>
                            <a href="{{ route('dashboard.index') }}">
                              <i class="fa fa-robot" aria-hidden="true"></i> ADMIN 
                            </a>
                            </li>
                            @endif
                          <li class="active"><a href="{{ route('profile') }}">{{ Auth::user()->name }}</a></li>
                        @endif
                  </ul>   
                  
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  @yield('content')<!-- main content here -->

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2048 LUGX Gaming Company. All rights reserved. &nbsp;&nbsp; <a rel="nofollow" href="https://templatemo.com" target="_blank">Design: TemplateMo</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>