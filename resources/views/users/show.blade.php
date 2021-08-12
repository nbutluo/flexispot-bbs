@extends('layouts.app')

@section('title', $user->name . ' Individual')

@section('content')
<div class="main">
  <div class="main-header">
    <div class="main-header-left">
      <div class="image">
        <img class="card-img-top" src="{{ asset($user->avatar) }}" alt="{{ $user->name }}">
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
        <span>Posts {{ count($user->topics()->get()) ? count($user->topics()->get()) : 0}}</span>
      </a>
      <a href="{{ route('users.show',[$user->id, 'tab' => 'collects'])}}" class="{{ active_navbar_class(if_query('tab', 'collects')) }}">
        <img src="{{ asset('/assets/collect.png') }}">
        <span>Collect {{ count($user->collects()) ? count($user->collects()) : 0}}</span>
      </a>

      @can('update',$user)
      <a href=""> <img src="{{ asset('/assets/xinfeng.png') }}" alt=""> <span> Message</span></a>
      @endcan
    </div>

    <div class="main-contain-right">
      @if (if_query('tab', 'collects'))
      @include('users._collects',['collects'=> $user->collects()])
      @else
      @include('users._posts',['posts'=> $user->topics()->recent()->paginate(5)])
      @endif
    </div>

  </div>
</div>
@stop
@section('styles')
<link rel="stylesheet" href="{{mix('css/person.css')}}">
@endsection
