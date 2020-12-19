@extends('layouts.app')

@section('title', 'Home')

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/home.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ['active' => 'home'])
  @include('shared.alert')
  <main class="background">
    BLOG
  </main>

  <section class="blog-posts row">
    @foreach ($posts as $post)
    <div class="col-xs-12 col-md-6 mb-4">
        <div class="card text-center">
            <img src="{{ $post->image_file }}" alt="blog-image"
                class="blog-img card-img-top" />
            <div class="card-body">
                <p class="blog-category text-muted">{{ $post->category }}</p>
                <h3 class="card-title mb-2">{{ $post->title }}</h3>
                <div class="d-flex justify-content-around align-items-center mb-2">
                    <img src="{{ $post->user->image_file }}" alt="avatar"
                        class="user-img">
                    <p class="card-text text-muted"><a
                      href="{{ route('users.show', $post->user) }}">{{$post->user->username}}</a>
                      | | {{$post->updated_at->diffForHumans() }}</p>
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
