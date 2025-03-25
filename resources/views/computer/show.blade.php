<!-- Developed by Valeria Corrales Hoyos -->
@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          <b>{{ $viewData["computer"]->getName() }}</b>
        </h5>
        <p class="card-text text-success">
          $ {{ number_format($viewData["computer"]->getPrice(), 2) }}
        </p>
        <p class="card-text">{{ __('computer.reference') }}: {{ $viewData["computer"]->getReference() }}</p>
        <p class="card-text">{{ __('computer.brand') }}: {{ $viewData["computer"]->getBrand() }}</p>
        <p class="card-text">{{ __('computer.type') }}: {{ $viewData["computer"]->getType() }}</p>
        <p class="card-text">{{ __('computer.description') }}: {{ $viewData["computer"]->getDescription() }}</p>

        @auth
          {{-- Botón para añadir a la Wishlist --}}
          <form action="{{ route('items.store') }}" method="POST" class="d-inline">
            @csrf
            <input type="hidden" name="computer_id" value="{{ $viewData['computer']->getId() }}">
            <input type="hidden" name="wishlist" value="1">
            <input type="hidden" name="quantity" value="1">
            <button type="submit" class="btn btn-success mt-2">{{ __('wishlist.add_to_wishlist') }}</button>
          </form>

          {{-- Botón para añadir a la Orden --}}
          <form action="{{ route('items.store') }}" method="POST" class="d-inline ms-2">
            @csrf
            <input type="hidden" name="computer_id" value="{{ $viewData['computer']->getId() }}">
            <input type="hidden" name="quantity" value="1">
            <button type="submit" class="btn btn-primary mt-2">{{ __('order.add_to_order') }}</button>
          </form>
        @endauth

      </div>
    </div>
  </div>
</div>
@endsection
