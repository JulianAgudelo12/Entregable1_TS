<!-- Developed by Julian Agudelo -->
@extends('layouts.admin')
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
          <b>{{ $viewData["component"]->getName() }}</b>
        </h5>
        <p class="card-text"style="color: green">$ {{ $viewData["component"]->getPrice() }}</p>
        <p class="card-text">{{ __('component.reference') }}: {{ $viewData["component"]->getReference() }}</p>
        <p class="card-text">{{ __('component.brand') }}: {{ $viewData["component"]->getBrand() }}</p>
        <p class="card-text">{{ __('component.quantity') }}: {{ $viewData["component"]->getQuantity() }}</p>
        <p class="card-text">{{ __('component.speed') }}: {{ $viewData["component"]->getSpeed() }}</p>
        <p class="card-text">{{ __('component.capacity') }}: {{ $viewData["component"]->getCapacity() }}</p> 
        <p class="card-text">{{ __('component.generation') }}: {{ $viewData["component"]->getGeneration() }}</p>
        <p class="card-text">{{ __('component.type') }}: {{ $viewData["component"]->getType() }}</p>
        <p class="card-text">{{ __('component.cores') }}: {{ $viewData["component"]->getCores() }}</p>
        <a href="{{ route('admin.component.edit', $viewData["component"]->getId()) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('admin.component.destroy', $viewData["component"]->getId()) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this reference?')">Delete</button>
        </form>        
      </div>
    </div>
  </div>
</div>
@endsection