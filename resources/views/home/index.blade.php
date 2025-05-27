<!-- Developed by Santiago Rodriguez Mojica -->
@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')

<div class="container text-center my-5">
    <h1 class="fw-bold">{{ __('message.welcome_title') }}</h1>
    <p class="lead">{{ __('message.welcome_message') }}</p>
</div>

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
        <div class="col-md-6">
            <a href="{{ route('recommend.show') }}" class="btn btn-outline-warning w-100 py-3">
                {{ __('message.recommend') }}
            </a>
        </div>
    </div>
</div>

@endsection
