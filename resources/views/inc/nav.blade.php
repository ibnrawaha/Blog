
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="/">KIK Blog </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/">Home</a>
        </li>
        @foreach ($pages as $page)
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/pages/{{$page->title}}">{{$page->title}}</a>
          </li>
        @endforeach
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/posts">Blog</a>
        </li>
      </ul>
    </div>

    @if (Auth::check())
    <div class="dropdown" id="navbarResponsive">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{strtok(ucfirst(auth()->user()->name), " ")}}
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="/user/profile/{{auth()->user()->name}}">User Profile</a></li>
          <li><a href="/posts/create">Create Post</a></li>
          <li><a href="/pages">Manages Pages</a></li>
          <li><a href="/dashboard">Dashboard</a></li>
          <li>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </div>
    @else
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/register">Register</a>
        </li>
      </ul>
    </div>
    @endif

  </div>
</nav>


