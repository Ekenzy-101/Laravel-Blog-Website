@extends('layouts.app')

@section('title', 'Verify Email')

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/login.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ['active' => ''])
  @include('shared.alert')
  <div class="register-section">
    <form action="{{ route('verification.resend') }}" method="POST">
      @csrf
      <legend class="mb-4">Verify Your Email</legend>

      <div class="form-group">
        <p>An verification email has been sent to <strong>{{Auth::user()->email}}</strong>. You need to verify your email before you can create blogs. <strong>If you didn't see a mail, try checking your spam or click the button below to request another mail</strong></p>
      </div>

      <div class="form-group mt-5">
        <button type="submit" class="btn register-btn">RESEND VERIFICATION EMAIL</button>
      </div>
    </form>
  </div>
@endsection
