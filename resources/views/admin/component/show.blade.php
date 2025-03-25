@extends('layouts.admin')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      @if($viewData["component"]->getImagePath())
        <img src="{{ asset('storage/' . $viewData["component"]->getImagePath()) }}" class="img-fluid rounded-start" alt="{{ $viewData["component"]->getName() }}">
      @else
        <img src="https://via.placeholder.com/300x200" class="img-fluid rounded-start" alt="{{ __('component.no_image') }}">
      @endif
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          <b>{{ <span class="math-inline">viewData\["component"\]\-\>getName\(\) \}\}</b\>
</h5\>
<p class\="card\-text"style\="color\: green"\></span> {{ $viewData["component"]->getPrice() }}</p>
        <p class="card-text">{{ __('component.reference') }}: {{ $viewData["component"]->getReference() }}</p>
        <p class="card-text">{{ __('component.brand') }}: {{ $viewData["component"]->getBrand() }}</p>
        <p class="card-text">{{ __('component.quantity') }}: {{ $viewData["component"]->getQuantity() }}</p>
        <p class="card-text">{{ __('component.speed') }}: {{ $viewData["component"]->getSpeed() }}</p>
        <p class="card-text">{{ __('component.capacity