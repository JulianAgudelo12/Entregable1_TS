@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])


@section('content')
  <div class="component-detail bg-white p-4 rounded shadow-sm">
    <div class="row align-items-center">
      <div class="col-md-4">
        @if($viewData["component"]->getImagePath())
          <img src="{{ asset('storage/' . $viewData['component']->getImagePath()) }}" class="img-fluid" alt="{{ $viewData['component']->getName() }}">
        @else
          <img src="https://via.placeholder.com/300x200" class="img-fluid" alt="{{ __('component.no_image') }}">
        @endif
      </div>
      <div class="col-md-8">
        <h3>{{ $viewData['component']->getName() }}</h3>
        <p><strong>{{ __('component.reference') }}:</strong> {{ $viewData['component']->getReference() }}</p>
        <p><strong>{{ __('component.brand') }}:</strong> {{ $viewData['component']->getBrand() }}</p>
        <p><strong>{{ __('component.quantity') }}:</strong> {{ $viewData['component']->getQuantity() }}</p>
        <p><strong>{{ __('component.speed') }}:</strong> {{ $viewData['component']->getSpeed() }}</p>
        <p><strong>{{ __('component.capacity') }}:</strong> {{ $viewData['component']->getCapacity() }}</p>
        <p><strong>{{ __('component.generation') }}:</strong> {{ $viewData['component']->getGeneration() }}</p>
        <p><strong>{{ __('component.type') }}:</strong> {{ $viewData['component']->getType() }}</p>
        <p><strong>{{ __('component.cores') }}:</strong> {{ $viewData['component']->getCores() }}</p>
        <p><strong>{{ __('component.price') }}:</strong> ${{ $viewData['component']->getPrice() }}</p>
      </div>
    </div>
  </div>
@endsection