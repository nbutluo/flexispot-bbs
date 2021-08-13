@extends('layouts.app')

@section('content')
<div class="main">
  <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    @include('shared._error')
    @include('shared._messages')
    <div class="main-input">
      <input type="text" id="name" name="name" placeholder="Username" value="{{ old('name', $user->name) }}">
    </div>

    <div class="main-input">
      <input type="text" id="email" name="email" placeholder="Email" value="{{ old('email',$user->email) }}">
    </div>

    <div class="main-title">Individual Resume</div>

    <div class="main-textarea">
      <textarea name="introduction" cols="30" rows="10" placeholder="Please fill in at least three characters">{{ old('introduction', $user->introduction) }}</textarea>
    </div>

    <div class="main-title">User avatar</div>
    <div class="main-textarea">
      @if($user->avatar)
      <div id="user-avatar" name="avatar"></div>
      @endif
      <!-- <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" /> -->
    </div>
    <div class="main-button">
      <button class="preserve" type="submit">Preserve</button>
      <button class="cancel" type="reset" onclick="javascript:history.back(-1);">Cancel</button>
    </div>
  </form>

</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ mix('css/Individual.css') }}">
@endsection

@section('scripts')
<script src=" {{ asset('js/cupload.js') }}"></script>
<script>
  var coverImage = new Cupload({
    ele: '#user-avatar',
    name: 'avatar',
    data: ['{{ $user->avatar }}'],
    maxSize: 1024,
  });
</script>
@endsection
