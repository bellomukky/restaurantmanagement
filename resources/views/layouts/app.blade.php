<!DOCTYPE html>



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    @yield('styles')
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Foodie - For your health and lifestyle</title>
    <style>
        
    </style>
</head>
<body>
    <div id="wrapper">
        <header class="fixed-top">
            <div class="topnav  pr-3 pl-3 pr-md-5 pl-md-5">
                <div>
                    <div class="row align-items-center">
                        <div class="col-6 col-md-3">
                            <a href="https://facebook.com/irosport" target="_blank" class="social-icon px-2 pl-0"><span
                                    class="fa fa-facebook"></span></a>
                            <a href="https://instagram.com/irorunsportupdate" target="_blank" class="social-icon px-2"><span
                                    class="fa fa-instagram"></span></a>
                            <a href="https://twitter.com/iro_sport" target="_blank" class="social-icon px-2"><span
                                    class="fa fa-twitter"></span></a>
                            <a href="https://linkedin.com/irosport" target="_blank" class="social-icon  px-2"><span
                                    class="fa fa-linkedin"></span></a>
                        </div>
                        <div class="col-6 col-md-9 text-right">
                            <div class="d-inline-block">
                                <a href="{{route('cart')}}" class="p-2 d-flex align-items-center cart-icon" ><i
                                        class="fa fa-shopping-cart mr-1"></i> <span id="cart-count" class="mr-1">{{session('cart') ?array_sum(array_column(session('cart'),'quantity')):0}} </span> Item(s) </a>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            <nav class="navbar navbar-inverse navbar-expand-md navcolor scrolling-navbar pr-3 pl-3 pr-md-5 pl-md-5">
                <a class="navbar-brand" href="{{route('index')}}">Abegbe's Kitchen</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mr-5" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li><a class="nav-item nav-link active" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a></li>
                        @guest
                        <li><a class="nav-item nav-link" href="{{route('login')}}">Login</a></li>
                        <li><a class="nav-item nav-link" href="{{route('register')}}">Register</a></li>
                        @else
                         <li><a href="{{route('my-orders')}}" class="nav-item nav-link" href="#">My Orders</a></li>
                         <form action="{{route('logout')}}" id="logout-form" method="post" style="display:none;">
                            @csrf
                        </form>
                        <li><a class="nav-item nav-link" onclick='document.getElementById("logout-form").submit()' href="javascript:void(0)">Logout</a></li>
                        @endguest
                    </ul>
                </div>
            </nav>
        
        
        
        </header>
            
       @yield('main-content')
        <section class="intro-section">
            <!-- Nested Container Starts -->
            <div class="container text-center">
                <!-- Nested Row Starts -->
                <div class="row">
                    <!-- #1 Starts -->
                    <div class="col-md-3 col-sm-6">
                        <i class="fa fa-flash circle"></i>
                        <h6>Lightning Fast Delivery</h6>
                    </div>
                    <!-- #1 Ends -->
                    <!-- #2 Starts -->
                    <div class="col-md-3 col-sm-6">
                        <i class="fa fa-glass circle"></i>
                        <h6>No Minimum Order</h6>
                    </div>
                    <!-- #2 Ends -->
                    <!-- Clearfix Starts -->
                    <div class="clearfix d-xs-block d-sm-block d-md-none" style="height: 10px;">
                        <p>&nbsp;</p>
                    </div>
                    <!-- Clearfix Ends -->
                    <!-- #3 Starts -->
                    <div class="col-md-3 col-sm-6">
                        <i class="fa fa-credit-card circle"></i>
                        <h6>Pay via Card/Cash</h6>
                    </div>
                    <!-- #3 Ends -->
                    <!-- #4 Starts -->
                    <div class="col-md-3 col-sm-6">
                        <i class="fa fa-dollar circle"></i>
                        <h6>Deals Discounts</h6>
                    </div>
                    <!-- #4 Ends -->
                </div>
                <!-- Nested Row Ends -->
            </div>
            <!-- Nested Container Ends -->
        </section>
        <footer class="main-footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
        
                        <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
                            <div class="footer-col">
                                <h4 class="footer-title">About us</h4>
                                <ul class="list-unstyled footer-nav">
                                    <li><a href="#">About Company</a></li>
                                    <li><a href="#">For Business</a></li>
                                    <li><a href="#">Our Partners</a></li>
                                    <li><a href="#">Press Contact</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="event-home.html">Events</a></li>
                                </ul>
                            </div>
                        </div>
        
                        <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
                            <div class="footer-col">
                                <h4 class="footer-title">Help &amp; Contact</h4>
                                <ul class="list-unstyled footer-nav">
                                    <li><a href="#">
                                            Stay Safe Online
                                        </a></li>
                                    <li><a href="#">
                                            How to Sell</a></li>
                                    <li><a href="#">
                                            How to Buy
                                        </a></li>
                                    <li><a href="#">Posting Rules
                                        </a></li>
        
                                    <li><a href="#">
                                            Promote Your Ad
                                        </a></li>
        
                                </ul>
                            </div>
                        </div>
        
                        <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
                            <div class="footer-col">
                                <h4 class="footer-title">More From Us</h4>
                                <ul class="list-unstyled footer-nav">
                                    <li><a href="faq.html">FAQ
                                        </a></li>
                                    <li><a href="blogs.html">Blog
                                        </a></li>
                                    <li><a href="#">
                                            Popular Searches
                                        </a></li>
                                    <li><a href="#"> Site Map
                                        </a></li>
                                    <li><a href="#"> Customer Reviews
                                        </a></li>
        
        
                                </ul>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
                            <div class="footer-col">
                                <h4 class="footer-title">Account</h4>
                                <ul class="list-unstyled footer-nav">
                                    <li><a href="account-home.html"> Manage Account
                                        </a></li>
                                    <li><a href="login.html">Login
                                        </a></li>
                                    <li><a href="signup.html">Register
                                        </a></li>
                                    <li><a href="account-myads.html"> My ads
                                        </a></li>
                                    <li><a href="seller-profile.html"> Profile
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-xl-4 col-xl-4 col-md-4 col-12">
                            <div class="footer-col row">
        
                                <div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
                                    <div class="mobile-app-content">
                                        <h4 class="footer-title">Mobile Apps</h4>
                                        <div class="row ">
                                            <div class="col-6  ">
                                                <a class="app-icon" target="_blank" href="https://itunes.apple.com/">
                                                    <span class="hide-visually">iOS app</span>
                                                    <img src="{{asset('images/app_store_badge.svg')}}" alt="Available on the App Store">
                                                </a>
                                            </div>
                                            <div class="col-6  ">
                                                <a class="app-icon" target="_blank" href="https://play.google.com/store/">
                                                    <span class="hide-visually">Android App</span>
                                                    <img src="{{asset('images/google-play-badge.svg')}}" alt="Available on the App Store">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
                                    <div class="hero-subscribe">
                                        <h4 class="footer-title no-margin">Follow us on</h4>
                                        <ul
                                            class="list-unstyled list-inline footer-nav social-list-footer social-list-color footer-nav-inline">
                                            <li><a class="icon-color fb" title="" data-placement="top" data-toggle="tooltip"
                                                    href="#" data-original-title="Facebook"><i class="fa fa-facebook-f"></i>
                                                </a></li>
                                            <li><a class="icon-color tw" title="" data-placement="top" data-toggle="tooltip"
                                                    href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li><a class="icon-color gp" title="" data-placement="top" data-toggle="tooltip"
                                                    href="#" data-original-title="Google+"><i class="fa fa-google-plus"></i>
                                                </a></li>
                                            <li><a class="icon-color lin" title="" data-placement="top" data-toggle="tooltip"
                                                    href="#" data-original-title="Linkedin"><i class="fa fa-linkedin"></i> </a>
                                            </li>
                                            <li><a class="icon-color pin" title="" data-placement="top" data-toggle="tooltip"
                                                    href="#" data-original-title="Linkedin"><i class="fa fa-pinterest-p"></i>
                                                </a></li>
                                        </ul>
                                    </div>
        
                                </div>
                            </div>
                        </div>
                        <div style="clear: both"></div>
        
                        <div class="col-xl-12">
                            <div class=" text-center paymanet-method-logo">
        
                                <img src="{{asset('images/master_card.png')}}" alt="img">
                                <img alt="img" src="{{asset('images/visa_card.png')}}">
                                <img alt="img" src="{{asset('images/verve.jpg')}}">
                                <img alt="img" src="{{asset('images/paystack.jpg')}}"> 
                            </div>
        
                            <div class="copy-info text-center">
                                © {{Date("Y")}} Foodie. All Rights Reserved.
                            </div>
        
                        </div>
        
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/test.js')}}"></script>
  @yield('scripts')
</html>
