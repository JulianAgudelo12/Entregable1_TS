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
        <p class="card-text" style="color: green">$ {{ number_format($viewData["computer"]->getPrice(), 2) }}</p>
        <p class="card-text">{{ __('computer.reference') }}: {{ $viewData["computer"]->getReference() }}</p>
        <p class="card-text">{{ __('computer.brand') }}: {{ $viewData["computer"]->getBrand() }}</p>
        <p class="card-text">{{ __('computer.type') }}: {{ $viewData["computer"]->getType() }}</p>
        <p class="card-text">{{ __('computer.description') }}: {{ $viewData["computer"]->getDescription() }}</p>        

        <form action="{{ route('items.store') }}" method="POST" class="mt-3">
          @csrf
          <input type="hidden" name="computer_id" value="{{ $viewData['computer']->getId() }}">
          <input type="hidden" name="wishlist_id" value="{{ auth()->id() }}">
          <input type="hidden" name="quantity" value="1"> <!-- Always 1 -->
          <button type="submit" class="btn btn-success mt-2">{{ __('wishlist.add_to_wishlist') }}</button>
        </form>

        <form action="{{ route('items.store') }}" method="POST" class="mt-3">
          @csrf
          <input type="hidden" name="computer_id" value="{{ $viewData['computer']->getId() }}">
          <input type="hidden" name="order_id" value="{{ auth()->id() }}">

          <div class="form-group">
            <label for="quantity"><b>{{ __('order.quantity') }}:</b></label>
            <input type="number" class="form-control" name="quantity" min="1" value="1" required>
          </div>

          <button type="submit" class="btn btn-primary mt-2">{{ __('order.add_to_order') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
