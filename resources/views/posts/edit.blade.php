@extends('layouts.app')

@section('title', 'Edit Post')

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/account.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ['active' => ''])
  @include('shared.alert')
  <div class="create-post-content">
    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
      @csrf
      @method("PUT")
      @include('shared.post-form', ['legend_label' => 'Edit post', 'button_label' => 'SAVE' ])
    </form>
</div>

@endsection
