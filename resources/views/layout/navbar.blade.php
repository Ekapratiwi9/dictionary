<nav class="navbar navbar-expand-lg ">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home.index') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('history.index') }}">History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('bookmark.index') }}">Favorite</a>
              </li>
              
              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
              @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </li>
                </ul>
              </li>
        
              @endguest
            </ul>
          </div>
        </div>
    </nav>