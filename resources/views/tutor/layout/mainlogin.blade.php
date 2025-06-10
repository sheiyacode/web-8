<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wordella - English Online Course</title>
  <link href="{{ asset('scholar/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('scholar/assets/css/templatemo-scholar.css') }}">
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
@include('user.component.navbarlogin')

  <main>
    @yield('content')
  </main>
  
  @include('user.component.footer')

  <script src="{{ asset('scholar/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('scholar/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
