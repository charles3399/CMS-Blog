<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        @yield('title')
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('img/Laravel.png') }}">
  </head>

  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
            <a class="navbar-brand btn-round btn-xs btn-outline-secondary" href="{{ route('welcome') }}">
              <h4>CMS</h4>
          </a>
        </div>

        @if (auth()->user())
          <a class="btn btn-xs btn-round btn-outline-primary" href="{{ route('login') }}">Admin</a>
        @else
          <a class="btn btn-xs btn-round btn-outline-primary" href="{{ route('login') }}">Login</a>
        @endif
        
        

      </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
    @yield('header')
    <!-- /.header -->

    @yield('css')


    <!-- Main Content -->
    @yield('content')


    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
            <a class="navbar-brand" href="{{ route('welcome') }}"><h4>CMS</h4></a>
          </div>

          <div class="col-6 col-lg-3 text-right">
            <div class="social">
              <a class="social-facebook" href="https://www.facebook.com/say.bernaldez" target="_blank"><i class="fa fa-facebook"></i></a>
              <!--<a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>-->
              <a class="social-instagram" href="https://www.instagram.com/say_bernaldez/" target="_blank"><i class="fa fa-instagram"></i></a>
              <!--<a class="social-reddit" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>-->
            </div>
          </div>

          <div class="col-3 col-lg-6 order-lg-last">
            <strong class="float-right">Powered by <a href="https://www.Laravel.com" target="_blank">Laravel</a> <img src="{{ asset('img/Laravel.png') }}" width="20px" height="20px"></strong>
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->


    <!-- Scripts -->
    <script src="{{ asset('js/page.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e9d52bb8caf7706"></script>
  </body>

  
</html>
