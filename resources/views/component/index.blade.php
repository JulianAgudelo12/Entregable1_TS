<!-- Developed by Julian Agudelo -->
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
  <div class="row">
    @foreach($viewData["components"] as $component)
      <div class="col-md-3">
        <a href="{{ route('component.show', $component->getId()) }}" style="text-decoration: none; color: inherit;">
          <div class="card mb-4">
            @if($component->getImage())
              <img src="data:image/jpeg;base64,{{ base64_encode($component->getImage()) }}" class="card-img-top" alt="{{ $component->getName() }}">
            @else
              <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ __('component.no_image') }}">
            @endif
            <div class="card-body text-center">
              <h5 class="card-title">{{ $component->getName() }}</h5>
              <p class="card-text">{{ __('component.price') }}: ${{ $component->getPrice() }}</p>
            </div>
          </div>
        </a>
      </div>
    @endforeach
  </div>

  <div class="text-center mt-4">
    <a href="{{ route('home.index') }}" class="btn btn-primary">{{ __('component.home') }}</a>
  </div>
@endsection

