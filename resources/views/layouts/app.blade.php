<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon"
    href="https://www.flexispot.fr/media/favicon/stores/1/cropped-flexispot-logo-32x32.png" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'FlexiSpot Forum') </title>
  <meta name="description" content="@yield('description', 'FlexispotBBS')" />

  <!-- Styles -->
  <link href="{{ mix('css/footer.css') }}" rel="stylesheet">
  <link href="{{ mix('css/header.css') }}" rel="stylesheet">
  <link href="{{ mix('css/ant-message.css') }}" rel="stylesheet">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link href="{{ mix('css/index.css') }}" rel="stylesheet">

  @yield('styles')

</head>

<body>
  @include('layouts._header')
  <div class="app" id="app" class="{{ route_class() }}-page">
    @include('shared._messages')

    @yield('content')
  </div>
  @yield('control-btns')
  @include('layouts._footer')

  @if (app()->isLocal())
  @include('sudosu::user-selector')
  @endif

  {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/checkbrower.js') }}"></script>
  <script src="{{ asset('js/common.js') }}"></script>
  <!-- Scripts -->
  @yield('scripts')

</body>

</html>
