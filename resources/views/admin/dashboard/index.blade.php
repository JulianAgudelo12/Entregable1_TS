{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container py-2">
  {{-- Encabezado con título y subtítulo --}}
  <div class="row text-center mb-4">
    <div class="col-12">
      <h2 class="fw-bold">
        {{ __('dashboard.welcome') }}
      </h2>
      <p class="text-muted">
        {{ __('dashboard.manage') }}
      </p>
    </div>
  </div>

  {{-- Tarjetas de estadísticas con gutter spacing g-2 --}}
  <div class="row g-2">
    {{-- Usuarios --}}
    <div class="col-md-3">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body text-center p-2">
          <h5 class="card-title">{{ __('user.title') }}</h5>
          <p class="display-4 fw-bold mb-2">
            {{ $viewData['totalUsers'] ?? 0 }}
          </p>
          <a href="{{ route('admin.user.index') }}" class="btn btn-primary mt-2">
            <i class="bi bi-people"></i>
            {{ __('user.admin_panel') }}
          </a>
        </div>
      </div>
    </div>

    {{-- Computadoras --}}
    <div class="col-md-3">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body text-center p-2">
          <h5 class="card-title">{{ __('computers.title') }}</h5>
          <p class="display-4 fw-bold mb-2">
            {{ $viewData['totalComputers'] ?? 0 }}
          </p>
          <a href="{{ route('admin.computer.index') }}" class="btn btn-secondary mt-2">
            <i class="bi bi-pc"></i>
            {{ __('computer.admin_panel') }}
          </a>
        </div>
      </div>
    </div>

    {{-- Componentes --}}
    <div class="col-md-3">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body text-center p-2">
          <h5 class="card-title">{{ __('layout.components') }}</h5>
          <p class="display-4 fw-bold mb-2">
            {{ $viewData['totalPC_Components'] ?? 0 }}
          </p>
          <a href="{{ route('admin.pc_component.index') }}" class="btn btn-success mt-2">
            <i class="bi bi-motherboard"></i>
            {{ __('dashboard.manage_components') }}
          </a>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
@endsection

