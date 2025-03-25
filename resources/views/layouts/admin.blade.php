<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <title>@yield('title', 'Admin Panel')</title>
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">Admin Panel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav"
        aria-controls="adminNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="adminNav">
        <ul class="navbar-nav ms-auto">
          
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.computer.index') }}">Computers</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.user.index') }}">Users</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.component.index') }}">Components</a></li>
          <li class="nav-item">
            <form id="logout" action="{{ route('logout') }}" method="POST">
              @csrf
              <a role="button" class="nav-link text-danger" onclick="document.getElementById('logout').submit();">Logout</a>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <!-- Main Content -->
  <div class="container mt-4">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="text-center py-3 mt-5 bg-dark text-light">
    <small>© {{ date('Y') }} Admin Panel</small>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
