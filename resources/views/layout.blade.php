@if(Auth::check() && Auth::user()->type == 1)
    @section('login')
    <li><a href="{{ route('logout') }}" class="buy" style="font-size:15px">Log Out</a></li>
    @endsection
    @section('register')
    <li class="@yield('signin')"><a href="{{ route('account') }}">Account</a></li>
    @endsection
    @else
    @section('login')
    <li><a class="buy" href="{{ route('loginPage') }}" style="font-size:15px">Login</a></li>
    @endsection
    @section('register')
    <li class="@yield('signin')"><a href="{{ route('registerPage') }}">Register</a></li>
    @endsection
@endif

<!DOCTYPE html>
<html lang="en">
<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>@yield('title')</title>
   <!-- bootstrap css -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   {{-- Icons --}}
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">
   <!-- style css -->
   @yield('style-link')
   <!-- Responsive-->
   <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
   <!-- Tweaks for older IEs-->
   {{-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> --}}
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>

<body class="main-layout" style="@yield('body')">
    {{-- Alert Include For Giving Alerts In Page --}}
    @include('sweetalert::alert')

    {{-- For Error Messages --}}
    @include('layout.message')

   <!-- Loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#" /></div>
   </div>

   <!-- Header -->
   <header>
      <!-- header inner -->
      <div class="header">
         <div class="head_top" style="padding-top: 5px">
            <div class="container">
               <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <div class="top-box">
                        <ul class="sociel_link">
                           <li> <a href="#"><i class="fa fa-facebook"></i></a></li>
                           <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                           <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <div class="top-box">
                        <p>One Stop Solution For All Kind Of Electronics Gadgets</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a href="{{ route('index') }}"><img src="{{ asset('images/logo.jpg') }}" alt="logo"/></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                           <ul class="menu-area-main">
                              <li class="@yield('home')"><a href="{{ route('index') }}">Home</a></li>
                              <li class="@yield('products')"><a href="{{ route('products') }}">Products</a></li>
                              <li class="@yield('categories')"><a href="{{ route('categories') }}">Categories</a></li>
                              <li class="@yield('contact')"><a href="{{ route('contact') }}">Contact Us</a></li>
                              @yield('register')
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                    @yield('login')
               </div>
            </div>
         </div>
   </header>

   <div>
        @yield('content')
   </div>

   <!-- Footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <ul class="sociel">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <br>
                <div>
                    <center>
                        <div class="contact">
                            <h3 style="color: white;font-size:x-large;">LINKS</h3>
                            <ul>
                                <li style="display: inline-block;"><a href="{{ route('products') }}" style="color: white;" onMouseOver="this.style.color='#ffc221'"
                                    onMouseOut="this.style.color='white'">Products</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li style="display: inline-block;"><a href="{{ route('categories') }}" style="color: white;" onMouseOver="this.style.color='#ffc221'"
                                    onMouseOut="this.style.color='white'">Categories</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li style="display: inline-block;" ><a href="{{ route('feedback') }}" style="color: white;" onMouseOver="this.style.color='#ffc221'"
                                    onMouseOut="this.style.color='white'">Feedback</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li style="display: inline-block;"><a href="{{ route('contact') }}" style="color: white;" onMouseOver="this.style.color='#ffc221'"
                                    onMouseOut="this.style.color='white'">Contact Us</a></li>
                            </ul>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright 2023, All Right Reserved By <a href="{{ route('index') }}">LIGHTEN ONLINE SHOP</a></p>
        </div>
    </footr>

 <!-- Javascript Files-->
 <script src="{{ asset('js/jquery.min.js') }}"></script>
 <script src="{{ asset('js/popper.min.js') }}"></script>
 <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
 <script src="{{ asset('js/plugin.js') }}"></script>

 <!-- Sidebar -->
 <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
 <script src="{{ asset('js/custom.js') }}"></script>
 <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
 <script>
    $(document).ready(function(){
    $(".fancybox").fancybox({
    openEffect: "none",
    closeEffect: "none"
    });

    $(".zoom").hover(function(){

    $(this).addClass('transition');
    }, function(){

    $(this).removeClass('transition');
    });
    });
 </script>
</body>
</html>

