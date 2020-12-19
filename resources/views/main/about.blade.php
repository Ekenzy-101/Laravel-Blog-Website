@extends('layouts.app')

@section('title', 'About')

@section('css')
  <link rel="stylesheet" href="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/css/about.scss.css">
@endsection

@section('content')
  @include('shared.navbar', ['active' => 'about'])
  @include('shared.alert')
  <div id="carouselId" class="carousel slide mb-4" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselId" data-slide-to="0" class="active"></li>
      <li data-target="#carouselId" data-slide-to="1"></li>
      <li data-target="#carouselId" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">

      <div class="carousel-item active">
        <img src="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/power-station.jpg" alt="First slide" class="d-block w-100" />
        <div class="carousel-caption d-md-block">
          <h3>Rank Tracking</h3>
          <p>Track performance of hundreds (or thousands) of your traffic-driving keywords across 200+ search engines</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/background.jpg" alt="Second slide" class="d-block w-100" />
        <div class="carousel-caption d-md-block">
          <h3>Site Audits</h3>
          <p>We crawl your site on demand, uncover technical SEO issues and recommend improvements and fixes</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="https://kenzy-blog-files.s3.af-south-1.amazonaws.com/new-york.jpg" alt="Third slide" class="d-block w-100" />
        <div class="carousel-caption d-md-block">
          <h3>Keyword Research</h3>
          <p>Discover thosusands of keywords to target along with Keyword Difficulty scores competitor research, and
              SERP analysis
          </p>
        </div>
      </div>

    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <section class="about-us w-75 mx-auto">
    <h3 class="text-center ">About Kenzy</h3>
    <p class="mb-4">
      Hi, my name is Onyekaba Ekenedilichukwu Emmanuel. I am a resourceful and conscientious fullstack developer skilled in using React, NodeJS, Laravel and AWS to deliver secure functional websites built to industry standards.
    </p>
    <p class="mb-4">
      I started my programming journey a year ago when I was discussing with my friend. I first started with
      the mindset of making money from it by learning Data Science.
      Later I realized that, I really didn't like what I was learning due to the money mindset. When I realized what I
      really liked was web and software development, I couldn't get enough. I watched youtube videos, read documentations,
      praticed regularly and built small projects to perfect my skills. I also took online courses on Udacity and Coursera
      to become a certified Fullstack Developer. I am looking forward to bringing that passion to hire myself out as a freelancer.
    </p>
    <p class="mb-4">
      If you like this project and you are a programmer, you can star this project at
      <a href="https://github.com/Ekenzy-101/Flask-Blog-App" target="_blank" referrerpolicy="no-referrer" rel="noopener" >here</a>. Also if you will
      like to see more updates from me, you can follow me <a href="https://github.com/Ekenzy-101" target="_blank" referrerpolicy="no-referrer" rel="noopener">here</a>
    </p>
    <p class="mb-4">
        If you are not a programmer, I have an advice for you - learn programming because learning it sharpens your
        reasoning skills. It doesn't matter who you are and what you do, you can learn it as an hobby.
        Thank you so much for your time.
    </p>
  </section>
@endsection
