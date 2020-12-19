@extends('layouts.app')

@section('title', 'Register')

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/register.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ['active' => 'register'])
  @include('shared.alert')
  <div class="register-section">
    <form action="{{ route('auth.register') }}" method="POST">
      @csrf
      <legend class="mb-4">Join the community to create some wonderful blogs</legend>

      <div class="form-group">
        <label for="username" class="form-control-label">Username</label>
        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="johndoe" value="{{ old('username') }}">
        @error('username')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="fullname" class="form-control-label">Fullname</label>
        <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="John Doe" value="{{ old('fullname') }}">
        @error('fullname')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
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

      <div class="form-group ">
        <label for="password_confirmation" class="form-control-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" >
      </div>

      <div class="form-group mt-5">
        <button type="submit" class="btn register-btn">REGISTER</button>
      </div>

      <div class="form-group">
        <p class="text-center">
          Already Have An Account? <a class="ml-2" href="{{ route('auth.login') }}">Sign In</a>
        </p>
      </div>

    </form>
  </div>
@endsection
