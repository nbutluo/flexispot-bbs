@extends('layouts.app')

@section('styles')
<link href="{{ mix('css/login.css') }}" rel="stylesheet">
<style>
  .form-row {
    display: flex;
    margin-bottom: 28px;
    align-items: center;
  }

  .captcha {
    display: inline-block;
    width: 200px;
    height: 50px;
    background: #cfc;
  }

  .action-btn {
    color: #fff;
    background-color: #1b76de;
    padding: 12px 10px;
    margin-left: 8px;
    box-shadow: 0 3px 10px 0 rgb(28 80 162 / 15%);
    border-radius: 6px;
    text-transform: uppercase;
  }

  .link {
    color: #1b76de;
  }

  .link:hover {
    color: #8f929a;
  }

  @media (max-width: 780px) {
    .app {
      margin: 0 auto;
    }

    .app .login-title h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }
  }
</style>
@endsection

@section('content')
<div class="login-form">
  <form method="POST" action="{{ route('register') }}" name="register">
    @csrf
    <div class="login-part">
      <div class="login-title">
        <h1>Create New Customer Account</h1>
      </div>

      <div class="text-box">
        <p class="info">Personal Information</p>
      </div>

      <div class="form-item">
        <label for="" class="title">User Name</label>

        <input type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required placeholder="User Name">

        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
      </div>

      <div class="form-item">
        <label for="" class="title">Email</label>

        <input type="email" placeholder="Email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>

      <div class="form-item">
        <label for="" class="title">{{ __('Password') }}</label>

        <input type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
      </div>

      <div class="form-item">
        <label for="" class="title">{{ __('Confirm Password') }}</label>

        <input type="password" name="password_confirmation" required>
      </div>

      <div class="form-item">
        <label for="" class="title">Please type the letters and numbers below</label>

        <input type="text" class="{{ $errors->has('captcha') ? ' is-invalid' : '' }}" name="captcha" required>

        @if ($errors->has('captcha'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('captcha') }}</strong>
        </span>
        @endif
      </div>

      <div class="form-row">
        <span class="captcha">
          <img class="thumbnail captcha mt-3 mb-2" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
        </span>
        <span class="action-btn reload-captcha">Reload captcha</span>
      </div>

      <div class="form-row" style="justify-content: space-between">
        <a href="{{ route('login') }}" class="link">Go back</a>
        <span class="action-btn" onclick="document.forms['register'].submit()">Create an Account</span>
      </div>
    </div>
  </form>
</div>

@endsection

@section('scripts')
<script>
  $(function() {
    $('.reload-captcha').click(function() {
      $('.captcha').attr('src', "/captcha/flat?" + Math.random());
    });
  })
</script>
@endsection
