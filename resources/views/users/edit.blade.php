@extends('layouts.app')

@section('title', 'Account')

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/account.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ['active' => 'account'])
  @include('shared.alert')

  <div class="account-content">

    <div class="media">
      <img src="{{ Auth::user()->image_file }}" alt="avatar" class="avatar img-thumbnails ">
      <div class="media-body">
        <p class="fullname">{{ Auth::user()->fullname }}</p>
        <small class="username text-muted">{{ Auth::user()->username }}</small>
        <p class="job-title">{{ Auth::user()->job_title }}</p>
      </div>
    </div>

    <form method="POST" action="{{ route('users.update', Auth::user()) }}" enctype="multipart/form-data">
      @csrf
      @method("PUT")
      <legend class="mb-4">Account Info</legend>
      <div class="form-group">
        <label for="username" class="form-control-label">Username</label>
        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ Auth::user()->username }}">
        @error('username')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="fullname" class="form-control-label">Fullname</label>
        <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" value="{{ Auth::user()->fullname }}">
        @error('fullname')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="email" class="form-control-label">Email</label>
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" readonly>
        @error('email')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="job_title" class="form-control-label">Job Title</label>
        <input type="text" name="job_title" class="form-control @error('job_title') is-invalid @enderror" value="{{ Auth::user()->job_title }}">
        @error('job_title')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="location" class="form-control-label">Location</label>
        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ Auth::user()->location }}">
        @error('location')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="bio" class="form-control-label">Bio</label>
        <textarea type="text" name="bio" class="form-control @error('bio') is-invalid @enderror" rows="7">{{ Auth::user()->bio }}</textarea>
        @error('bio')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="twitter_link" class="form-control-label">Twitter Link</label>
        <input type="text" name="twitter_link" class="form-control @error('twitter_link') is-invalid @enderror" value="{{ Auth::user()->twitter_link }}">
        @error('twitter_link')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="facebook_link" class="form-control-label">Facebook Link</label>
        <input type="text" name="facebook_link" class="form-control @error('facebook_link') is-invalid @enderror" value="{{ Auth::user()->facebook_link }}">
        @error('facebook_link')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="instagram_link" class="form-control-label">Instagram Link</label>
        <input type="text" name="instagram_link" class="form-control @error('instagram_link') is-invalid @enderror" value="{{ Auth::user()->instagram_link }}">
        @error('instagram_link')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="linkedin_link" class="form-control-label">LinkedIn Link</label>
        <input type="text" name="linkedin_link" class="form-control @error('linkedin_link') is-invalid @enderror" value="{{ Auth::user()->linkedin_link }}">
        @error('linkedin_link')
        <div class="invalid-feedback">
          <span>{{ $message }}</span>
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="image_file" class="form-control-label">Upload Profile Picture</label>
        <input type="file" name="image_file" class="form-control-file">
        @error('image_file')
        <small class="mt-2 text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <button type="submit" class="btn update-btn">SAVE</button>
      </div>

  </div>
@endsection
