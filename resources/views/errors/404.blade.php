@extends('layouts.app')

@section('title', 'Not Found')

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/error.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ["active" => ""])
  <section class="error-content">
    <div>
      <h1 class="error-code">404</h1>
      <strong class="error-title">Oops! File not found</strong>
      <p class="main">
        I am afraid you have found a page that doesn't exist on Kenzy's Blog.
        That can happen when you follow a link to something that has since been deleted.
        Or the link was incorrect to begin with
      </p>
      <p class="secondary">
        Sorry about that. We've logged the error for review, in case it's our fault.
      </p>
    </div>
</section>
@endsection
