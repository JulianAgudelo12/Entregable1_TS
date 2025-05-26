{{-- resources/views/admin/computer/show.blade.php --}}
@extends('layouts.admin')

@section('title',    $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="container py-4">
  <div class="card shadow-sm">
    <div class="row g-3">
      {{-- Imagen con tamaño fijo --}}
      <div class="col-md-4">
        @if($viewData['computer']->getImage())
          <img 
            src="{{ asset('storage/' . $viewData['computer']->getImage()) }}" 
            alt="{{ $viewData['computer']->getName() }}" 
            class="w-100 rounded-start"
            style="height: 200px; object-fit: cover;"
          >
        @else
          <img 
            src="https://via.placeholder.com/300x200?text={{ urlencode(__('No Image')) }}" 
            alt="{{ __('No Image') }}" 
            class="w-100 rounded-start"
            style="height: 200px; object-fit: cover;"
          >
        @endif
      </div>

      {{-- Detalles --}}
      <div class="col-md-8">
        <div class="card-body">
          <h3 class="card-title">{{ $viewData['computer']->getName() }}</h3>
          <p class="h5 text-success mb-4">
            {{ '$' . number_format($viewData['computer']->getPrice(), 2) }}
          </p>

          <ul class="list-unstyled mb-4">
            <li><strong>{{ __('Reference') }}:</strong> <span class="ms-1">{{ $viewData['computer']->getReference() }}</span></li>
            <li><strong>{{ __('Brand') }}:</strong>     <span class="ms-1">{{ $viewData['computer']->getBrand() }}</span></li>
            <li><strong>{{ __('Type') }}:</strong>      <span class="ms-1">{{ ucfirst($viewData['computer']->getType()) }}</span></li>
            <li><strong>{{ __('Description') }}:</strong> <span class="ms-1">{{ $viewData['computer']->getDescription() }}</span></li>
            <li><strong>{{ __('Stock') }}:</strong>     <span class="ms-1">{{ $viewData['computer']->getQuantity() }}</span></li>
          </ul>

          {{-- Acciones --}}
          <div class="d-flex">
            <a 
              href="{{ route('admin.computer.edit', $viewData['computer']->getId()) }}" 
              class="btn btn-warning me-2"
            >
              {{ __('Edit') }}
            </a>
            <form 
              action="{{ route('admin.computer.destroy', $viewData['computer']->getId()) }}" 
              method="POST" 
              onsubmit="return confirm('{{ __('Are you sure you want to delete this computer?') }}')"
            >
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">
                {{ __('Delete') }}
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
