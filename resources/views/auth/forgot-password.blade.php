@extends('layouts.app')

@section('title', 'Send Password Reset Email')

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/login.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ['active' => ''])
  @include('shared.alert')
  <div class="register-section">
    <form action="{{ route('password.email') }}" method="POST">
      @csrf
      <legend class="mb-4">Send Password Reset Email</legend>

      <div class="form-group">
        <strong>Enter your Laravel Blog account's verified email address and we will send you a password reset link.</strong>
      </div>

      <div class="form-group">
        <label for="email" class="form-control-label">Email</label>
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="johndoe@gmail.com" value="{{ old('email') }}">
        @error('email')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group mt-5">
        <button type="submit" class="btn register-btn">SEND RESET EMAIL</button>
      </div>

      <div class="form-group">
        <p class="text-center">
          Don't Have An Account? <a class="ml-2" href="{{ route('auth.register') }}">Sign Up</a>
        </p>
      </div>

      <div class="form-group">
        <p class="text-center">
          Already Have An Account? <a class="ml-2" href="{{ route('auth.login') }}">Sign In</a>
        </p>
      </div>

    </form>
  </div>
@endsection
