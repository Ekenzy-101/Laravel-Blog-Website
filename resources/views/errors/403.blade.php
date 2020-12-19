@extends('layouts.app')

@section('title', 'Forbidden')

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/error.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ["active" => ""])
  <section class="error-content">
    <div>
      <h1 class="error-code">403</h1>
      <strong class="error-title">Oops! Access not granted</strong>
      <p class="main">I am sorry to say this but you are not authorized to access this data
        That can happen when you are not logged in at moment or the link was incorrect to begin with.
      </p>
      <p class="secondary">
        Please Try Logging In or Go to The Home Page
      </p>
    </div>
</section>
@endsection
