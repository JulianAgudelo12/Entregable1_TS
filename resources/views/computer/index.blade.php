<!-- Developed by Julián Agudelo Cifuentes, Compare logic added by Valeria Corrales Hoyos -->

@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
  @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif

  <form method="GET" action="{{ route('computer.compare') }}">
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

          <div class="form-check text-center mt-2">
            <input class="form-check-input" type="checkbox" name="computers[]" value="{{ $computer->getId() }}">
            <label class="form-check-label">{{ __('computer.compare') }}</label>
          </div>
        </div>
      @endforeach
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-success">{{ __('computer.compare_selected') }}</button>
      <a href="{{ route('home.index') }}" class="btn btn-primary">{{ __('computer.home') }}</a>
    </div>
  </form>
@endsection
