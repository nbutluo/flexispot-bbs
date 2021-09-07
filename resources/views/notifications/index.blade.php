@extends('layouts.app')

@section('title', 'Notification Message')

@section('content')
<div class="main">
  <div class="main-content" id="message-container">
    <div class="every-column">
      <img src="{{ asset('/assets/bell.png') }}" alt="" class="bell-img">
      <span class="message-span">Message</span>
    </div>
    <div class="message-list">
      @if ($notifications->count())
      @foreach ($notifications as $notification)
      @include('notifications.types._' . Str::snake(class_basename($notification->type)))
      @endforeach
      @else
      <div class="every-column">{{ _('No message notification') }}</div>
      @endif
    </div>
    <div class="main-paging">{!! $notifications->onEachSide(1)->links('pagination::page') !!}</div>
  </div>

</div>
@stop

@section('styles')
<link rel="stylesheet" href="{{ mix('css/message.css') }}">
@endsection


@section('scripts')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.pjax.js') }}"></script>
<script src="{{ asset('js/nprogress.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/nprogress.css') }}">

<script>
  $(document).ready(function() {
    $(document).pjax('a', '#message-container');
    //定义pjax有效时间，超过这个时间会整页刷新
    $.pjax.defaults.timeout = 1200;

    $(document).on('pjax:start', function() {
      NProgress.start();
    });
    $(document).on('pjax:end', function() {
      NProgress.done();
    });
  });
</script>
@endsection
