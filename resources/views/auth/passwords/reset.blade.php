@extends('layouts.app')

@section('styles')
<link href="{{ mix('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="login-form">
    <form method="POST" action="{{ route('password.update') }}" name="password-update">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="login-part">
            <div class="login-title">
                <h1>Reset Password</h1>
            </div>

            <div class="text-box">
                <p class="info">Personal Information</p>
            </div>

            <div class="form-item">
                <label for="" class="title">Email</label>

                <input name="email" type="email" placeholder="Email" class="@error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="form-item">
                <label for="" class="title">Password</label>

                <input type="password" class="@error('password') is-invalid @enderror" required name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-item">
                <label for="" class="title">Confirm Password</label>

                <input type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-row" style="justify-content: space-between">
                <a href="http://usbbs.test/login" class="link">Go back</a>
                <span class="action-btn" onclick="document.forms['password-update'].submit()">Reset Password</span>
            </div>
        </div>
    </form>
</div>
@endsection
