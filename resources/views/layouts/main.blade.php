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
      <title>Fiu</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Detail Product css -->
      
      <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	   
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="/css/detailproduct.css"/>
      <!-- bootstrap css -->
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <link href="/https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!-- style css -->
      <link rel="stylesheet" href="/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="/css/owl.carousel.min.css">
      <link rel="stylesheet" href="/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="/https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    @include('layouts.navbar')
    <div class="container">
      @yield('content')
    </div>

   <!-- footer section start -->
   <div class="footer_section mt-3">
      <div class="container">
         <div class="footer_location_text">
            <ul>
               <li><img src="/images/map-icon.png"><span class="padding_left_10"><a href="#">Loram Ipusm hosting web</a></span></li>
               <li><img src="/images/call-icon.png"><span class="padding_left_10"><a href="#">Call : +7586656566</a></span></li>
               <li><img src="/images/mail-icon.png"><span class="padding_left_10"><a href="#">demo@gmail.com</a></span></li>
            </ul>
         </div>
         <div class="row">
            <div class="col-lg-3 col-sm-6">
               <h2 class="useful_text">Alternative link </h2>
               <div class="footer_menu">
                  <ul>
                     <li><a href="/home">Home</a></li>
                     <li><a href="/about">About</a></li>
                     <li><a href="/shop">Shop</a></li>
                     <li><a href="/contact">Contact Us</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-3 col-sm-6">
               <h2 class="useful_text">Description</h2>
               <p class="lorem_text">Lorem ipsum dolor sit amet, consectetur  adipiscinaliqua  Loreadipiscing </p>
            </div>
            <div class="col-lg-3 col-sm-6">
               <h2 class="useful_text">Social Media</h2>
               <div id="social">
                  <a class="facebookBtn smGlobalBtn active" href="#" ></a>
                  <a class="twitterBtn smGlobalBtn" href="#" ></a>
                  <a class="googleplusBtn smGlobalBtn" href="#" ></a>
                  <a class="linkedinBtn smGlobalBtn" href="#" ></a>
               </div>
            </div>
            <div class="col-sm-6 col-lg-3">
               <h1 class="useful_text">Others</h1>
               <p class="footer_text">Lorem ipsum dolor sit amet, consectetur adipiscinaliquaLoreadipiscing </p>
            </div>
         </div>
      </div>
   </div>
   <!-- footer section end -->
   <!-- copyright section start -->
   <div class="copyright_section mt-3">
      <div class="container">
         <p class="copyright_text">Kelompok 7 Praktikum Pemrograman Internet 2022.</p>
      </div>
   </div>
   <!-- copyright section end -->
   <!-- Javascript files-->
   <script src="/js/jquery.min.js"></script>
   <script src="/js/popper.min.js"></script>
   <script src="/js/bootstrap.bundle.min.js"></script>
   <script src="/js/jquery-3.0.0.min.js"></script>
   <script src="/js/plugin.js"></script>
   <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
   <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <!-- sidebar -->
   <script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="/js/custom.js"></script>
   <!-- javascript --> 
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   <script src="/js/owl.carousel.js"></script>
   <script src="/https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>