{{-- resources/views/admin/computer/create.blade.php --}}
@extends('layouts.admin')

@section('title',    $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="container py-4">
  {{-- Errores de validación --}}
  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0 list-unstyled">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header">
          <h3 class="mb-0">{{ __('computer.create') }}</h3>
        </div>

        <div class="card-body">
          <form method="POST"
                action="{{ route('admin.computer.store') }}"
                enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="reference" class="form-label">{{ __('computer.reference') }}</label>
              <input
                type="text"
                id="reference"
                name="reference"
                class="form-control"
                placeholder="{{ __('computer.reference') }}"
                value="{{ old('reference') }}"
                required
              >
            </div>

            <div class="mb-3">
              <label for="name" class="form-label">{{ __('computer.name') }}</label>
              <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                placeholder="{{ __('computer.name') }}"
                value="{{ old('name') }}"
                required
              >
            </div>

            <div class="mb-3">
              <label for="brand" class="form-label">{{ __('computer.brand') }}</label>
              <input
                type="text"
                id="brand"
                name="brand"
                class="form-control"
                placeholder="{{ __('computer.brand') }}"
                value="{{ old('brand') }}"
                required
              >
            </div>

            <div class="row g-2 mb-3">
              <div class="col">
                <label for="quantity" class="form-label">{{ __('computer.quantity') }}</label>
                <input
                  type="number"
                  id="quantity"
                  name="quantity"
                  class="form-control"
                  placeholder="{{ __('computer.quantity') }}"
                  value="{{ old('quantity') }}"
                  min="0"
                  required
                >
              </div>
              <div class="col">
                <label for="type" class="form-label">{{ __('computer.type') }}</label>
                <select
                  id="type"
                  name="type"
                  class="form-select"
                  required
                >
                  <option value="">{{ __('computer.select_type') }}</option>
                  <option value="desktop" {{ old('type') == 'desktop' ? 'selected' : '' }}>
                    {{ __('computer.desktop') }}
                  </option>
                  <option value="laptop" {{ old('type') == 'laptop' ? 'selected' : '' }}>
                    {{ __('computer.laptop') }}
                  </option>
                </select>
              </div>
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">{{ __('computer.description') }}</label>
              <textarea
                id="description"
                name="description"
                class="form-control"
                placeholder="{{ __('computer.description') }}"
                rows="3"
                required
              >{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
              <label for="price" class="form-label">{{ __('computer.price') }}</label>
              <input
                type="number"
                id="price"
                name="price"
                class="form-control"
                placeholder="{{ __('computer.price') }}"
                value="{{ old('price') }}"
                step="0.01"
                min="0"
                required
              >
            </div>

            <div class="mb-3">
              <label for="image" class="form-label">{{ __('computer.image') }}</label>
              <input
                type="file"
                id="image"
                name="image"
                class="form-control"
                accept="image/*"
              >
            </div>

            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">
                {{ __('computer.save') }}
              </button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
