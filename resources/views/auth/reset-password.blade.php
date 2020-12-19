@extends('layouts.app')

@section('title', 'Reset Password')

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/login.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ['active' => ''])
  @include('shared.alert')
  <div class="register-section">
    <form action="{{ route('password.update') }}" method="POST">
      @csrf
      <input type="hidden" name="token" value="{{$token}}">
      <legend class="mb-4">Reset Password</legend>

      <div class="form-group">
        <strong>Enter your new Laravel Blog account's password to change your password</strong>
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

      <div class="form-group">
        <label for="password" class="form-control-label">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" >
        @error('password')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password_confirmation" class="form-control-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" >
      </div>

      <div class="form-group mt-5">
        <button type="submit" class="btn register-btn">RESET PASSWORD</button>
      </div>

    </form>
  </div>
@endsection
