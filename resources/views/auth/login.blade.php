@extends('layouts.app')

@section('title', 'Login')

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/login.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ['active' => 'login'])
  @include('shared.alert')
  <div class="register-section">
    <form action="{{ route('auth.login') }}" method="POST">
      @csrf
      <legend class="mb-4">Welcome Back</legend>

      <div class="form-group">
        <label for="email" class="form-control-label">Email</label>
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="johndoe@gmail.com" value="{{ old('email') }}">
        @error('email')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password" class="form-control-label">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" >
        @error('password')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group pl-4">
        <input type="checkbox" name="remember" class="form-check-input">
        <label for="remember" class="form-check-label">Remember me</label>
      </div>

      <div class="form-group mt-5">
        <button type="submit" class="btn register-btn">LOGIN</button>
      </div>

      <div class="form-group">
        <p class="text-center">
          Don't Have An Account? <a class="ml-2" href="{{ route('auth.register') }}">Sign Up</a>
        </p>
      </div>

      <div class="form-group">
        <p class="text-center">
          Forgot Password? <a class="ml-2" href="{{ route('password.request') }}">Reset</a>
        </p>
      </div>

    </form>
  </div>
@endsection
