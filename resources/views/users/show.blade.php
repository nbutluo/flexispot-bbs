@extends('layouts.app')

@section('title', $user->name . ' Individual')

@section('content')
<div class="main" id="main-container">
  <div class="main-header">
    <div class="main-header-left">
      <div class="image">
        <img class="card-img-top" src="{{ $user->avatar }}" alt="{{ $user->name }}">
      </div>
    </div>

    <div class="main-header-right">
      <div class="name">{{ $user->name }}</div>
      <div class="motto">{{ $user->introduction }}</div>
    </div>
  </div>

  <div class="main-contain">
    <div class="main-contain-left">
      <a href="{{ route('users.show',$user->id) }}" class="{{ active_navbar_class(if_query('tab', null)) }}">
        <img src="{{ asset('/assets/duanxin.png') }}">
        <span>Posts {{ $user->posts() }}</span>
      </a>
      <a href="{{ route('users.show',[$user->id, 'tab' => 'collects'])}}"
         class="{{ active_navbar_class(if_query('tab', 'collects')) }}">
        <img src="{{ asset('/assets/collect.png') }}">
        <span>Collect {{ $user->collects()->total() ? $user->collects()->total() : 0}}</span>
      </a>

      @can('update',$user)
      <a href="{{ route('notifications.index') }}" target="_blank"> <img src="{{ asset('/assets/xinfeng.png') }}"
             alt=""> <span> Message</span></a>
      @endcan
    </div>

    <div class="main-contain-right">
      @if (if_query('tab', 'collects'))
      @include('users._collects',['collects'=> $user->collects()])
      @else
      @include('users._posts',['posts'=> $user->topics()->recent()->with('user','category')->paginate(5)])
      @endif
    </div>

  </div>
</div>
@stop
@section('styles')
<link rel="stylesheet" href="{{mix('css/person.css')}}">
@endsection

@section('scripts')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.pjax.js') }}"></script>
<script src="{{ asset('js/nprogress.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/nprogress.css') }}">

<script>
  $(document).ready(function() {
        $(document).pjax('a', '#main-container');
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
