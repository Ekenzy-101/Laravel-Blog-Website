<nav class="navbar navbar-expand-md navbar-light bg-light d-flex justify-content-around fixed-top">
  <a class="navbar-brand ml-lg-4 py-2" href="{{ route('main.home') }}">Laravel Blog</a>
  <button class="navbar-toggler py-2" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse  " id="collapsibleNavId">
    <ul class="navbar-nav w-75 d-flex align-items-center justify-content-around mx-auto mt-2 mt-lg-0 ">
      <li class="nav-item @if($active === 'home') active @endif">
        <a class="nav-link" href="{{ route('main.home') }}">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item @if($active === 'about') active @endif">
        <a class="nav-link" href="{{ route('main.about') }}">ABOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">SUBSCRIBE</a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              @auth
              <img src="{{ Auth::user()->image_file }}" alt="account" class="avatar">
              @endauth
              @guest
              <i class="fas fa-user-circle fa-2x"></i>
              @endguest

          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownId">
            @auth
            <form action="{{ route('auth.logout') }}" method="post">
              @csrf
              <button type="submit" class="dropdown-item" style="border: none; outline: none;">Logout</button>
            </form>
            <a class="dropdown-item @if($active === 'account') active @endif" href="{{ route('users.edit', Auth::user()) }}">Account</a>
            <a class="dropdown-item @if($active === 'new-post') active @endif" href="{{ route('posts.create') }}">New Post</a>
            @endauth

            @guest
            <a class="dropdown-item @if($active === 'login') active @endif" href="{{ route('auth.login') }}">Login</a>
            <a class="dropdown-item @if($active === 'register') active @endif" href="{{ route('auth.register') }}">Register</a>
            @endguest
          </div>
      </li>
    </ul>
  </div>
</nav>
