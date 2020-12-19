@extends('layouts.app')

@section('title', $user->fullname)

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/user.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ['active' => ''])
  @include('shared.alert')
  <div class="media">
    <img src="{{ $user->image_file }}" alt="avatar" class="img-user img-thumbnails ">
    <div class="media-body">
      <p class="fullname">{{$user->fullname}}</p>
      <small class="username text-muted">{{$user->username}}</small>
      <p class="job-title">{{ $user->job_title }}</p>
      <p class="email">
        <i class="fas fa-envelope"></i>
        {{$user->email}}
      </p>
      @if ($user->location)
      <p class="location">
        <i class="fas fa-map-marker-alt"></i>
        {{$user->location}}
      </p>
      @endif
      <div class="media-links">
        @if ($user->facebook_link)
        <a href="{{ $user->facebook_link }}" target="_blank" referrerpolicy="no-referrer" rel="noopener">
          <i class="fab fa-facebook-square"></i>
        </a>
        @endif
        @if ($user->instagram_link)
        <a href="{{ $user->instagram_link }}" target="_blank" referrerpolicy="no-referrer" rel="noopener">
          <span class="instagram">
            <span class="fab fa-instagram"></span>
          </span>
        </a>
        @endif
        @if ($user->twitter_link)
        <a href="{{ $user->twitter_link }}" target="_blank" referrerpolicy="no-referrer" rel="noopener">
          <i class="fab fa-twitter-square"></i>
        </a>
        @endif
        @if ($user->linkedin_link)
        <a href="{{ $user->linkedin_link }}" target="_blank" referrerpolicy="no-referrer" rel="noopener">
          <i class="fab fa-linkedin"></i>
        </a>
        @endif
      </div>
    </div>
    <div class="media-body">
      @if($user->bio)
      <h3 class="about">ABOUT</h3>
      <p>
        {{ $user->bio}}
      </p>
      @endif
    </div>
  </div>

  <h3 class="heading">CHECK OUT {{ $user->username}} POSTS </h3>

  <section class="blog-posts row">
    @foreach($posts as $post)
    <div class="col-xs-12 col-md-6 mb-3">
      <div class="card text-center">
        <img src="{{ $post->image_file }}" alt="blog-image"
          class="blog-img card-img-top" />
        <div class="card-body">
          <p class="blog-category text-muted">{{ $post->category }}</p>
          <h3 class="card-title">{{ $post->title }}</h3>
          <div class="d-flex justify-content-around align-items-center mb-2">
            <img src="{{ $post->user->image_file }}" alt="avatar" class="user-img">
            <p class="card-text text-muted"><a href="{{ route('users.show', $post->user->username) }}" class="user-link text-decoration-none">{{$post->user->username}}</a> | |
              {{$post->updated_at->diffForHumans() }}</p>
          </div>
          <a class="btn read-more" href="{{ route('posts.show', $post->id) }}">READ MORE</a>
        </div>
      </div>
    </div>
    @endforeach

    <div class="mx-auto" style="width: fit-content;">
      {{ $posts->links() }}
    </div>
  </section>
@endsection
