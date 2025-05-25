<!-- Developed by Julián Agudelo Cifuentes -->

@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
  <div class="row">
    @foreach ($viewData["computers"] as $computer)
      <div class="col-md-3">
        <x-product-card
          :route="route('computer.show', ['id'=> $computer->getId()])"
          :name="$computer->getName()"
          :price="$computer->getPrice()"
          :image="$computer->getImage()"
          :no-image-label="__('computer.no_image')"
        />
      </div>
    @endforeach
  </div>
  <div class="text-center mt-4">
    <a href="{{ route('home.index') }}" class="btn btn-primary">{{ __('computer.home') }}</a>
  </div>

@endsection
