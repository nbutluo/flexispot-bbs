<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/logo-fav.png">
  <title>@yield('title','后台登录')</title>
  <link rel="stylesheet" type="text/css" href="/beagle/static/css/perfect-scrollbar.css" />
  <link rel="stylesheet" type="text/css" href="/beagle/static/css/material-design-iconic-font.min.css" />
  <link rel="stylesheet" type="text/css" href="/beagle/static/css/jquery-jvectormap-1.2.2.css" />
  <link rel="stylesheet" type="text/css" href="/beagle/static/css/jqvmap.min.css" />
  <link rel="stylesheet" type="text/css" href="/beagle/static/css/bootstrap-datetimepicker.min.css" />
  <link rel="stylesheet" href="/beagle/static/css/app.css" type="text/css" />
</head>

<body class="be-splash-screen">
  <div class="be-wrapper be-login">
    <div class="be-content">
      <div class="main-content container-fluid">
        <div class="splash-container">
          @include('shared._error')
          @include('shared._messages')
          <div class="card card-border-color card-border-color-primary">
            <div class="card-header">
              <img class="logo-img" src="/beagle/static/images/logo-xx.png" alt="logo" width="102" height="27">
              <span class="splash-description">Flexispot BBS 后台管理</span>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="form-group">
                  <input class="form-control" name="username" value="{{ old('username') }}" type="text" placeholder="用户名" autocomplete="off">
                </div>
                <div class="form-group">
                  <input class="form-control" name="password" type="password" placeholder="密码">
                </div>
                <div class="form-group login-submit">
                  <button class="btn btn-primary btn-xl" type="submit" data-dismiss="modal">点击登录</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="/beagle/static/js/jquery.min.js" type="text/javascript"></script>
  <script src="/beagle/static/js/perfect-scrollbar.min.js" type="text/javascript"></script>
  <script src="/beagle/static/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="/beagle/static/js/app.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      //-initialize the javascript
      App.init();
    });
  </script>
</body>

</html>
