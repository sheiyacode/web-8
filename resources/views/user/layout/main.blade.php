<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Wordella - Online School HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('scholar/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('scholar/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('scholar/assets/css/templatemo-scholar.css') }}">
    <link rel="stylesheet" href="{{ asset('scholar/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('scholar/assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 586 Scholar

https://templatemo.com/tm-586-scholar

-->
  </head>
<style>
.header-area {
  position: fixed;
  background-color: #7a6ad8;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  padding: 15px 0;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  transition: background-color 0.5s ease;
}
.header-area .nav a {
  color: white;
}
</style>
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
@include('user.component.navbar')
  <!-- ***** Header Area End ***** -->

@yield('content')

@include('user.component.footer')

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('scholar/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('scholar/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('scholar/assets/js/isotope.min.js')}}"></script>
  <script src="{{ asset('scholar/assets/js/owl-carousel.js')}}"></script>
  <script src="{{ asset('scholar/assets/js/counter.js')}}"></script>
  <script src="{{ asset('scholar/assets/js/custom.js')}}"></script>

  </body>
</html>