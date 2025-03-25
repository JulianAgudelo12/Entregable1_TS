<!-- Developed by Julian Agudelo -->
@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
  <div class="container">
    <div class="card mb-4 shadow">
      <div class="row g-0 align-items-center">
        <div class="col-md-5 text-center p-4">
          @if ($viewData["component"]->getImage())
            <img src="data:image/jpeg;base64,{{ base64_encode($viewData["component"]->getImage()) }}" class="img-fluid rounded" alt="{{ $viewData["component"]->getName() }}">
          @else
            <div class="d-flex justify-content-center align-items-center bg-light text-muted" style="height: 250px;">
              <span>{{ __('component.no_image') }}</span>
            </div>
          @endif
        </div>

        <div class="col-md-7 p-4">
          <h3 class="mb-3">{{ $viewData["component"]->getName() }}</h3>
          <p><strong>Reference:</strong> {{ $viewData["component"]->getReference() }}</p>
          <p><strong>Brand:</strong> {{ $viewData["component"]->getBrand() }}</p>
          <p><strong>Speed:</strong> {{ $viewData["component"]->getSpeed() }} MHz</p>
          <p><strong>Capacity:</strong> {{ $viewData["component"]->getCapacity() }}</p>
          <p><strong>Generation:</strong> {{ $viewData["component"]->getGeneration() }}</p>
          <p><strong>Type:</strong> {{ $viewData["component"]->getType() }}</p>
          <p><strong>Cores:</strong> {{ $viewData["component"]->getCores() }}</p>
          <p class="text-success"><strong>Price:</strong> ${{ number_format($viewData["component"]->getPrice()) }}</p>

          <div class="mt-4 d-flex flex-wrap gap-3">
            <a href="{{ route('component.index') }}" class="btn btn-outline-secondary">
              {{ __('component.back') }}
            </a>

            @auth
              <!-- Añadir a Wishlist -->
              <form action="{{ route('items.store') }}" method="POST">
                @csrf
                <input type="hidden" name="component_id" value="{{ $viewData['component']->getId() }}">
                <input type="hidden" name="wishlist" value="1">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-success">
                  <i class="bi bi-heart"></i> {{ __('wishlist.add_to_wishlist') }}
                </button>
              </form>

              <!-- Añadir a Orden -->
              <form action="{{ route('items.store') }}" method="POST">
                @csrf
                <input type="hidden" name="component_id" value="{{ $viewData['component']->getId() }}">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-cart-plus"></i> {{ __('order.add_to_order') }}
                </button>
              </form>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
