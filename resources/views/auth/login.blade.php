@extends('layouts.app')
@section('title','Login Page')

@section('styles')
<link href="{{ mix('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="login-title">
  <h1>Customer Login</h1>
</div>
<div class="login-form">
  <div class="login-part">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="text-box">
        <p class="mid-title">Registered Customers</p>
        <p class="info">
          If you have an account, sign in with your email address.
        </p>
      </div>
      <div class="form-item">
        <label for="" class="title">Email</label>
        <input type="text" />
      </div>
      <div class="form-item">
        <label for="" class="title">Password</label>
        <input type="text" />
      </div>
      <div class="forget-pass">
        @if (Route::has('password.request'))
        <a class="loctek-link" href="{{ route('password.request') }}">
          Forget Your Pasword
        </a>
        @endif
        <span class="action-btn">Sign In</span>
      </div>
    </form>
  </div>
  <div class="create-part">
    <div class="text-box">
      <p class="mid-title">New Customers</p>
      <p class="info">
        Creating an account has many benefits: check out faster, keep more
        than one address, track orders and more.
      </p>
    </div>
    <div>
      <a href="{{ route('register') }}">
        <span class="action-btn">Create an Account</span>
      </a>
    </div>
  </div>
</div>
@endsection
