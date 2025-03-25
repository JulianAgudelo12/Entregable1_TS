<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', __('layout.title'))</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
</head>
<body class="bg-light text-dark">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ route('home.index') }}">
        {{ __('langLayout.brand') }}
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('langLayout.toggle_nav') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center gap-2">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home.index') }}">{{ __('langLayout.home') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('computer.index') }}">{{ __('langLayout.computers') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('component.index') }}">{{ __('langLayout.components') }}</a>
          </li>

          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('langLayout.login') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('langLayout.register') }}</a>
            </li>
          @else
            <li class="nav-item">
              <form id="logout" action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <a role="button" class="nav-link" onclick="document.getElementById('logout').submit();">{{ __('langLayout.logout') }}</a>
              </form>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Header -->
  <header class="page-header py-4 bg-primary text-white text-center shadow-sm">
    <div class="container">
      <h2 class="mb-0">@yield('subtitle', __('langLayout.subtitle'))</h2>
    </div>
  </header>

  <!-- Page Content -->
  <main class="container my-5">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <div class="container">
      <small>&copy; {{ date('Y') }} AssemblAI - {{ __('langLayout.rights') }}</small>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
