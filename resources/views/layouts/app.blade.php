<!-- Developed by Julian Agudelo -->
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
        {{ __('layout.brand') }}
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('layout.toggle_nav') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center gap-2">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home.index') }}">{{ __('layout.home') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('computer.index') }}">{{ __('layout.computers') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('pc_component.index') }}">{{ __('layout.components') }}</a>
          </li>

          @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ route('wishlist.index') }}">
                <i class="bi bi-heart"></i> {{ __('wishlist.title') }}
              </a>
            </li>
            @if (Auth::user()->order)
              <li class="nav-item">
                <a class="nav-link" href="{{ route('order.show', Auth::user()->order->getId()) }}">
                  {{ __('layout.my_order') }}
                </a>
              </li>
            @endif
            @if (Auth::user()->getIsAdmin())
              <li class="nav-item">
                <a class="nav-link btn btn-outline-light" href="{{ route('admin.dashboard.index') }}">
                  <i class="bi bi-shield-lock"></i> {{ __('layout.admin_mode') }}
                </a>
              </li>
            @endif
            <li class="nav-item">
              <form id="logout" action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <a role="button" class="nav-link text-danger" onclick="document.getElementById('logout').submit();">
                  {{ __('layout.logout') }}
                </a>
              </form>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('layout.login') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('layout.register') }}</a>
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
      <h2 class="mb-0">@yield('subtitle', __('layout.subtitle'))</h2>
    </div>
  </header>

  <!-- Page Content -->
  <main class="container my-5">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <div class="container">
      <small>&copy; {{ date('Y') }} AssemblAI - {{ __('layout.rights') }}</small>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
