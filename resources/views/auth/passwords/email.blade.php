@extends('layouts.app')

@section('styles')
<link href="{{ mix('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="login-form">
    <form method="POST" action="{{ route('password.email') }}" name="password-reset">
        @csrf
        <div class="login-part">

            @if (session('status'))
            <div data-show="true" class="ant-alert alert-success" role="alert">
                <span role="img" aria-label="check-circle" class="anticon anticon-check-circle ant-alert-icon">
                    <svg viewBox="64 64 896 896" focusable="false" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                        <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 01-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8 157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z">
                        </path>
                    </svg>
                </span>
                <div class="ant-alert-content">
                    <div class="ant-alert-message"> {{ session('status') }}</div>
                    <div class="ant-alert-description"></div>
                </div>
            </div>
            @endif

            <div class="login-title">
                <h1>{{ _('Forgot Your Password') }}</h1>
            </div>

            <div class="text-box">
                <p class="info">
                    {{ _('Please enter your email address below to receive a password reset link.') }}
                </p>
            </div>

            <div class="form-item">
                <label for="" class="title">Email</label>
                <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-row" style="justify-content: space-between">
                <a href="{{ route('login') }}" class="link">Go back</a>
                <span class="action-btn" onclick="document.forms['password-reset'].submit()">{{ _('Reset My Password') }}</span>
            </div>
        </div>
    </form>
</div>
@endsection
