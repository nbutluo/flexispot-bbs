<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/logo-fav.png">
  <title>@yield('title','后台管理')</title>
  <link rel="stylesheet" type="text/css" href="/beagle/static/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="/beagle/static/css/material-design-iconic-font.min.css" />
  <link rel="stylesheet" type="text/css" href="/beagle/static/css/jquery-jvectormap-1.2.2.css" />
  <link rel="stylesheet" type="text/css" href="/beagle/static/css/jqvmap.min.css" />
  <link rel="stylesheet" type="text/css" href="/beagle/static/css/bootstrap-datetimepicker.min.css" />
  <link rel="stylesheet" href="/beagle/static/css/app.css" type="text/css" />

  @yield('styles')
</head>

<body>
  <div id="app" class="be-wrapper be-fixed-sidebar  {{ route_class() }}-page">
    @include('admin.layouts._header')
    @include('admin.layouts._left_sidebar')
    <div class="be-content">
      <div class="main-content container-fluid">
        @include('admin.shared._messages')
        @yield('content')
      </div>
    </div>
    @include('admin.layouts._right_sidebar')
  </div>
  <script src="/beagle/static/js/jquery.min.js" type="text/javascript"></script>
  <script src="/beagle/static/js/perfect-scrollbar.min.js" type="text/javascript"></script>
  <script src="/beagle/static/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="/beagle/static/js/app.js" type="text/javascript"></script>
  <script src="/beagle/static/js/jquery.flot.js" type="text/javascript"></script>
  <script src="/beagle/static/js/jquery.flot.pie.js" type="text/javascript"></script>
  <script src="/beagle/static/js/jquery.flot.time.js" type="text/javascript"></script>
  <script src="/beagle/static/js/jquery.flot.resize.js" type="text/javascript"></script>
  <script src="/beagle/static/js/jquery.flot.orderbars.js" type="text/javascript"></script>
  <script src="/beagle/static/js/curvedlines.js" type="text/javascript"></script>
  <script src="/beagle/static/js/jquery.flot.tooltip.js" type="text/javascript"></script>
  <script src="/beagle/static/js/jquery.sparkline.min.js" type="text/javascript"></script>
  <script src="/beagle/static/js/countup.min.js" type="text/javascript"></script>
  <script src="/beagle/static/js/jquery-ui.min.js" type="text/javascript"></script>
  <script src="/beagle/static/js/jquery.vmap.min.js" type="text/javascript"></script>
  <script src="/beagle/static/js/jquery.vmap.world.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      //-initialize the javascript
      App.init();
      App.dashboard();

    });
  </script>
  @yield('script')
</body>

</html>
