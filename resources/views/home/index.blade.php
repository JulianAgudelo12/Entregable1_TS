<!-- Developed by Santiago Rodriguez Mojica -->
@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')

<div class="container text-center my-5">
    <h1 class="fw-bold">{{ __('message.welcome_title') }}</h1>
    <p class="lead">{{ __('message.welcome_message') }}</p>
</div>

<!-- Carousel de computadoras 
@if (!empty($viewData['featured']))
<div id="featuredCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($viewData['featured'] as $key => $computer)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ $computer->getImage() }}" class="d-block w-100" alt="{{ $computer->getName() }}">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="fw-bold">{{ $computer->getName() }}</h5>
                    <p class="fs-5">${{ number_format($computer->getPrice(), 2) }}</p>
                    <a href="{{ route('computer.show', $computer->getId()) }}" class="btn btn-primary">View Product</a>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#featuredCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#featuredCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
@endif
-->

<div class="container text-center">
    <h2 class="fw-bold mb-4">{{ __('message.explore') }}</h2>
    <div class="row g-4">
        <div class="col-md-6">
            <a href="{{ route('computer.index') }}" class="btn btn-outline-primary w-100 py-3">
                {{ __('message.computers') }}
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('pc_component.index') }}" class="btn btn-outline-success w-100 py-3">
                {{ __('message.components') }}
            </a>
        </div>
    </div>
</div>


@endsection
