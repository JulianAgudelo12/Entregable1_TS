<!-- Developed by Julián Agudelo Cifuentes -->

@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
  <div class="row">
    @foreach($viewData["pc_components"] as $pc_component)
      <div class="col-md-3">
        <x-product-card
          :route="route('pc_component.show', $pc_component->getId())"
          :name="$pc_component->getName()"
          :price="$pc_component->getPrice()"
          :image="$pc_component->getImage()"
          :no-image-label="__('pc_component.no_image')"
        />
      </div>
    @endforeach
  </div>

  <div class="text-center mt-4">
    <a href="{{ route('home.index') }}" class="btn btn-primary">{{ __('pc_component.home') }}</a>
  </div>
@endsection
