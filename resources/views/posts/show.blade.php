@extends('layouts.app')

@section('title', $post->title)

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/post.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ['active' => ''])
  @include('shared.alert')
  <section class="post-section">
    <p class="text-muted post-category">{{ $post->category }}</p>
    <p class="post-title">{{$post->title}}</p>
    <img src="{{ $post->image_file }}" alt="post-img" class="post-img" />
    <div class="post-info">

        <div class="d-flex justify-content-around align-items-center">
          @if ($post->user->facebook_link)
          <a href="{{ $post->user->facebook_link }}" target="_blank" referrerpolicy="no-referrer" rel="noopener">
            <i class="fab fa-facebook-square"></i>
          </a>
          @endif
          @if ($post->user->instagram_link)
          <a href="{{ $post->user->instagram_link }}" target="_blank" referrerpolicy="no-referrer" rel="noopener">
            <span class="instagram">
              <span class="fab fa-instagram"></span>
            </span>
          </a>
          @endif
          @if ($post->user->twitter_link)
          <a href="{{ $post->user->twitter_link }}" target="_blank" referrerpolicy="no-referrer" rel="noopener">
            <i class="fab fa-twitter-square"></i>
          </a>
          @endif
          @if ($post->user->linkedin_link)
          <a href="{{ $post->user->linkedin_link}}" target="_blank" referrerpolicy="no-referrer" rel="noopener">
            <i class="fab fa-linkedin"></i>
          </a>
          @endif
        </div>

        <div class="d-flex justify-content-around text-muted">
          <span>Posted {{$post->updated_at->diffForHumans()}}</span>

          <span class="mt-3">
            <img src="{{ $post->user->image_file }}" alt="avatar"
              class="img-author mr-2">
            <a href="{{ route('users.show', $post->user) }}"
              class="text-muted">{{$post->user->fullname}}</a>
          </span>
        </div>
    </div>

    <p class="post-body mb-3">
      {{ $post->content }}
    </p>

    <div class="form-group mt-3">
      @can('update', $post)
      <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">UPDATE</a>
      @endcan
      <!-- Button trigger modal -->
      @can('delete', $post)
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
          DELETE
      </button>
      <!-- Modal -->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Do you want to delete this post?</h5>
            </div>
            <div class="modal-body">
              Deleting this post means you will lose all its content
              and this action is irreversible, are you sure what you'll do now?
            </div>
            <div class="modal-footer">
              <form action="{{ route('posts.destroy', $post) }}" method="POST" class=" d-flex align-items-center p-0">
                @csrf
                @method("DELETE")
                <button type="button" class="btn px-4 mr-2" data-dismiss="modal" aria-label="Close">
                  Cancel
                </button>
                <button type="submit" class="btn btn-danger px-4">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endcan
    </div>

  </section>
@endsection
