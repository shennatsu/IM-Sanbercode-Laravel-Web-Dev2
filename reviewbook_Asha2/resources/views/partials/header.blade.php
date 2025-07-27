<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container position-relative d-flex align-items-center justify-content-between">

    <a href="/" class="logo d-flex align-items-center me-auto">
      <h1 class="sitename">Review Book</h1><span>.</span>
    </a>

    <nav id="navmenu" class="navmenu d-flex align-items-center">
      <ul class="d-flex align-items-center">
        <li><a href="/home">Home</a></li>
        <li><a href="{{ route('genre.index') }}">Genre</a></li>
        @guest
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
        @auth
    <li class="nav-item">
        <a class="nav-link" href="{{ route('profile.show') }}">Profil</a>
    </li>
    @endauth

        @endguest
<div class="d-flex justify-content-end align-items-center gap-3">
        @auth
          <li><a href="{{ route('profile.show') }}">Profil</a></li>
          <li><span class="nav-link">Hi, {{ Auth::user()->name }}</span></li>
          <li>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
              @csrf
              <button class="btn btn-link nav-link" type="submit" style="border:none; padding:0;">Logout</button>
            </form>
          </li>
        @endauth
        </div>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>
