@extends('layouts.app')

@section('styles')
<link href="{{ mix('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="login-form">
  <div class="login-part">
    <div class="login-title">
      <h1>Forgot Your Password</h1>
    </div>
    <div class="text-box">
      <p class="info">
        Please enter your email address below to receive a password reset link.
      </p>
    </div>
    <div class="form-item">
      <label for="" class="title">Email</label>
      <input type="text">
    </div>
    <div class="form-row" style="justify-content: space-between">
      <a href="{{ route('login') }}" class="link">Go back</a>
      <span class="action-btn">Reset My Password</span>
    </div>
  </div>
</div>
@endsection
