@extends('layouts.app')

@section('title', 'New Post')

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/account.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ['active' => 'new-post'])
  @include('shared.alert')
  <div class="create-post-content">
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
      @csrf
      @include('shared.post-form', ['legend_label' => 'Create a new post', 'button_label' => 'CREATE POST' ])
    </form>
</div>

@endsection
