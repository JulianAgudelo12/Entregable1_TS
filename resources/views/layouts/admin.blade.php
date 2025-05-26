{{-- resources/views/layouts/admin.blade.php --}}
<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', __('Admin Panel'))</title>

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    crossorigin="anonymous"
  />
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
</head>
<body class="d-flex flex-column min-vh-100 bg-light text-dark">
  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard.index') }}">
        {{ __('Admin Panel') }}
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#adminNav"
        aria-controls="adminNav"
        aria-expanded="false"
        aria-label="{{ __('Toggle navigation') }}"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="adminNav">
        <ul class="navbar-nav ms-auto align-items-center gap-2">
          <li class="nav-item">
            <a
              class="nav-link btn btn-outline-light me-2"
              href="{{ route('home.index') }}"
            >
              <i class="bi bi-person"></i>
              {{ __('layout.user_mode') }}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.computer.index') }}">
              {{ __('Computers') }}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user.index') }}">
              {{ __('Users') }}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.component.index') }}">
              {{ __('Components') }}
            </a>
          </li>
          <li class="nav-item">
            <form id="logout" action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <a
                role="button"
                class="nav-link text-danger"
                onclick="document.getElementById('logout').submit();"
              >
                {{ __('Logout') }}
              </a>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  {{-- Header / Subtitle --}}
  <header class="page-header py-4 bg-light text-center shadow-sm">
    <div class="container">
      <h2 class="mb-0">@yield('subtitle', __('Manage Dashboard'))</h2>
    </div>
  </header>

  {{-- Main Content --}}
  <main class="container my-5 flex-fill">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="bg-dark text-light text-center py-3 mt-auto">
    <div class="container">
      <small>© {{ date('Y') }} Admin Panel</small>
    </div>
  </footer>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"
  ></script>
</body>
</html>
