<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/img/favicon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Extra details for Live View on GitHub Pages -->
  <title>
    PetRide Web
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('/css/ui_dashboard/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/ui_dashboard/css/now-ui-dashboard.css?v=1.3.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  
</head>

<body class="{{ $class ?? '' }}">
  <div class="wrapper">
    @guest
      @include('layouts.page_template.guest')
    @endguest
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('/js/ui_dashboard/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/ui_dashboard/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('/js/ui_dashboard/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/js/ui_dashboard/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  
  <!-- Chart JS -->
  <script src="{{ asset('/js/ui_dashboard/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('/js/ui_dashboard/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/js/ui_dashboard/js/now-ui-dashboard.min.js?v=1.3.0') }}" type="text/javascript"></script>
  
  @stack('js')
</body>

</html>
