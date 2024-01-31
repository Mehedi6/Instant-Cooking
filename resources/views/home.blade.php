<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Instant Cooking</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
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
                        <a href="{{route('index')}}" class="logo"> 
                            <img src="assets/images/klassy-logo.png" > 
                            <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Recipe</a></li>
                           
                            
                            
                            
                            <li class="submenu">
                                <a href="javascript:;">Yours</a>
                                <ul>
                                    <li><a href="{{route('showFavorites')}}">See your favorties</a></li>
                                    <li><a href="{{route('showdiet')}}">Diet Recipes</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <li>
                            @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                   <li class= "text-align: right"> <x-app-layout> </x-app-layout> </li>
                                    
                                @else
                                    <li> <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a> </li>

                                    @if (Route::has('register'))
                                        <li> <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a> </li>
                                    @endif
                                @endauth
                            </div>
                            @endif
                        </li>
                        </ul>        
                        
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>Instant Cooking</h4>
                            <h6>THE BEST EXPERIENCE</h6>
                            <div class="main-white-button scroll-to-section">
                                <blockquote style="color: white;">Real food doesn't have ingredients, real food is ingredients.<br>
                                <cite>- Jamie Oliver</cite>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="assets/images/slide-01.jpg" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                          <!-- Item -->
                          
                          <!-- // Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about" >
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>About Us</h6>
                            <h2>We Leave A Delicious Memory For You</h2>
                        </div>
                        <p>Welcome to Instant Cooking! Our platform is a hub for food enthusiasts, offering a variety of easy-to-follow recipes that cater to different tastes and skill levels.

Whether you're looking for quick weekday dinner ideas, special occasion treats, or culinary inspiration, you'll find a diverse range of recipes at your fingertips. Each recipe comes with clear instructions, ingredient lists, and helpful tips, making your cooking experience enjoyable and stress-free.

Happy cooking!</p>
                        <div class="row">
                            <div class="col-4">
                                <img src="assets/images/about-thumb-01.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/about-thumb-02.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/about-thumb-03.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Our Recipe</h6>
                        <h2>Savor Irresistible Food Recipes</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">
                    <div class="item">
                        <div class='card card1'>
                            
                            <div class='info'>
                              <h1 class='title'>Spicy Arrabiata Penne</h1>
                              <p class='description'>Satisfy your craving for both warmth and zest with a dish that's as exciting as it is comforting.</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="{{ route('show','52771') }}">View Recipe <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card2'>
                            
                            <div class='info'>
                              <h1 class='title'>Lamb Biriyani</h1>
                              <p class='description'>Lamb biryani is a festive, flavorful, and exotic Indian restaurant-style dish perfect for guests or dinner parties. </p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="{{ route('show','52805') }}">View Recipe <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card3'>
                           
                            <div class='info'>
                              <h1 class='title'>Piri-piri chicken and slaw</h1>
                              <p class='description'>Piri-piri chicken, a Portuguese dish, features bold flavors, while winter slaw offers a refreshing contrast.</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="{{ route('show','53039')}}">View Recipe <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card4'>
                            
                            <div class='info'>
                              <h1 class='title'>Peanut Butter Cheesecake</h1>
                              <p class='description'>Enjoy irresistible peanut butter cheesecake as a mouth-watering delicious dessert.</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="{{ route('show','52861')}}">View Recipe <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card5'>
                          
                            <div class='info'>
                              <h1 class='title'>Portuguese Prego </h1>
                              <p class='description'>Explore the vibrant Portuguese prego sandwich, with a unique green piri-piri flavor.</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="{{ route('show','53042')}}">View Recipe <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card3'>
                           
                            <div class='info'>
                            <h1 class='title'>Szechuan Beef</h1>
                              <p class='description'>Celebration of bold flavors, featuring tender slices of beef that have been expertly marinated and wok-fried to perfection.</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">View Recipe <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
     
            </div>
        </div>
    </section>
    <div class="text-center mt-3">
        <a href="{{route('showrecipe')}}" class="btn btn-dark">Explore all recipes</a>
    </div>
    <!-- ***** Menu Area Ends ***** -->

    <!-- ***** Chefs Area Starts ***** -->
    <!--  -->

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>