@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      @if($viewData["computer"]->imagen_path)
      <img src="{{ asset('storage/' . $viewData['computer']->imagen_path) }}" class="img-fluid rounded-start" alt="{{ $viewData['computer']->getName() }}">
      @else
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start" alt="Default Image">
      @endif
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

        @auth
        <form action="{{ route('items.store') }}" method="POST" class="mt-3">
          @csrf
          <input type="hidden" name="computer_id" value="{{ $viewData['computer']->getId() }}">
          @php
          $wishlist = \App\Models\Wishlist::where('user_id', auth()->id())->first();
          @endphp

          <input type="hidden" name="wishlist_id" value="{{ optional($wishlist)->id }}">
          <input type="hidden" name="quantity" value="1">
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
        @endauth

      </div>
    </div>
  </div>
</div>
@endsection