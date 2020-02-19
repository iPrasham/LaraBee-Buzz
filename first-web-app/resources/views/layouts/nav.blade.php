<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      @if (!Auth::check())
      
        <a class="nav-link ml-auto" href="/login">Login</a>
        <a class="nav-link" href="/register">Register</a>
      
        @else
      
          <a class="nav-link active" href="#">Home</a>
          <a class="nav-link" href="#">New features</a>
          <a class="nav-link" href="#">Press</a>
          <a class="nav-link" href="#">New hires</a>
          <a class="nav-link" href="#">About</a>
          
          {{-- @if (Auth::check()) --}}
          <a href="#" class="nav-link ml-auto">
              {{  Auth::user()->name  }}
          </a>
          <a href="{{ route('logout') }}" class="nav-link">Logout</a>

        @endif
    </nav>
  </div>
</div>