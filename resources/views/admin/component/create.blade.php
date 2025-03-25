<!-- Developed by Julian Agudelo -->
@extends('layouts.admin')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
  <div class="container mt-3">
    <form action="{{ route('admin.component.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label for="reference" class="form-label">{{ __('component.reference') }}</label>
        <input type="text" class="form-control" id="reference" name="reference" required>
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">{{ __('component.name') }}</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

      <div class="mb-3">
        <label for="brand" class="form-label">{{ __('component.brand') }}</label>
        <input type="text" class="form-control" id="brand" name="brand" required>
      </div>

      <div class="mb-3">
        <label for="quantity" class="form-label">{{ __('component.quantity') }}</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required min="1">
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">{{ __('component.image') }}</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
      </div>

      <div class="mb-3">
        <label for="speed" class="form-label">{{ __('component.speed') }}</label>
        <input type="text" class="form-control" id="speed" name="speed" required>
      </div>

      <div class="mb-3">
        <label for="capacity" class="form-label">{{ __('component.capacity') }}</label>
        <input type="text" class="form-control" id="capacity" name="capacity">
      </div>

      <div class="mb-3">
        <label for="generation" class="form-label">{{ __('component.generation') }}</label>
        <input type="text" class="form-control" id="generation" name="generation" required>
      </div>

      <div class="mb-3">
        <label for="type" class="form-label">{{ __('component.type') }}</label>
        <input type="text" class="form-control" id="type" name="type" required>
      </div>

      <div class="mb-3">
        <label for="cores" class="form-label">{{ __('component.cores') }}</label>
        <input type="number" class="form-control" id="cores" name="cores" min="1">
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">{{ __('component.price') }}</label>
        <input type="number" class="form-control" id="price" name="price" required min="0">
      </div>

      <button type="submit" class="btn btn-success">{{ __('component.save') }}</button>
      <a href="{{ route('admin.component.index') }}" class="btn btn-secondary">{{ __('component.back_to_list') }}</a>
    </form>
  </div>
@endsection
