@extends('layouts.app')

@section('title', '我的通知')

@section('content')
<div class="main">
  <div class="main-content">
    <div class="every-column">
      <img src="./assets/bell.png" alt="" class="bell-img">
      <span class="message-span">Message</span>
    </div>
    @if ($notifications->count())
    @foreach ($notifications as $notification)
    @include('notifications.types._' . Str::snake(class_basename($notification->type)))
    @endforeach
    @else
    <div class="every-column">没有消息通知</div>
    @endif
  </div>

  <div class="main-paging">
    {!! $notifications->onEachSide(1)->links('pagination::page') !!}
  </div>
</div>
@stop

@section('styles')
<link rel="stylesheet" href="{{ mix('css/message.css') }}">
@endsection
