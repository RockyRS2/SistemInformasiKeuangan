<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-success" href="#">SIM Keuangan</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
      

        @guest
          <!-- Kalau belum login -->
          <li class="nav-item">
          <a class="nav-link active text-success" aria-current="page" href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success" href="#">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success" href="#">Kontak</a>
        </li>
           
          <li class="nav-item">
            <a class="nav-link text-success" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-success" href="{{ route('register') }}">Register</a>
          </li>
        @endguest

        @auth
          <!-- Kalau sudah login -->
          <li class="nav-item">
          <a class="nav-link active text-success" aria-current="page" href="{{ route('user.dashboard') }}">Beranda</a>
        </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-outline-success">Logout</button>
            </form>
          </li>
        @endauth

      </ul>
    </div>
  </div>
</nav>
