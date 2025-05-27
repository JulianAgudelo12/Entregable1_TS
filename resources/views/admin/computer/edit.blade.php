{{-- resources/views/admin/computer/edit.blade.php --}}
@extends('layouts.admin')

@section('title', __('computer.edit_title'))
@section('header-actions')
  <a href="{{ route('admin.computer.index') }}" class="btn btn-secondary">
    {{ __('computer.back') }}
  </a>
@endsection

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
          <h4 class="mb-0">{{ __('computer.edit') }}</h4>
        </div>
        <div class="card-body">
          <form
            method="POST"
            action="{{ route('admin.computer.update', $viewData['computer']->getId()) }}"
          >
            @csrf
            @method('PUT')

            {{-- Reference --}}
            <div class="mb-3">
              <label for="reference" class="form-label">{{ __('computer.reference') }}</label>
              <input
                type="text"
                id="reference"
                name="reference"
                class="form-control"
                value="{{ old('reference', $viewData['computer']->getReference()) }}"
                required
              >
            </div>

            {{-- Name --}}
            <div class="mb-3">
              <label for="name" class="form-label">{{ __('computer.name') }}</label>
              <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name', $viewData['computer']->getName()) }}"
                required
              >
            </div>

            {{-- Brand --}}
            <div class="mb-3">
              <label for="brand" class="form-label">{{ __('computer.brand') }}</label>
              <input
                type="text"
                id="brand"
                name="brand"
                class="form-control"
                value="{{ old('brand', $viewData['computer']->getBrand()) }}"
                required
              >
            </div>

            {{-- Quantity & Type --}}
            <div class="row g-2 mb-3">
              <div class="col">
                <label for="quantity" class="form-label">{{ __('computer.quantity') }}</label>
                <input
                  type="number"
                  id="quantity"
                  name="quantity"
                  class="form-control"
                  value="{{ old('quantity', $viewData['computer']->getQuantity()) }}"
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
                  <option value="">{{ __('-- Select a type --') }}</option>
                  <option value="desktop" {{ old('type', $viewData['computer']->getType()) === 'desktop' ? 'selected' : '' }}>
                    {{ __('computer.desktop') }}
                  </option>
                  <option value="laptop" {{ old('type', $viewData['computer']->getType()) === 'laptop' ? 'selected' : '' }}>
                    {{ __('computer.laptop') }}
                  </option>
                </select>
              </div>
            </div>

            {{-- Description --}}
            <div class="mb-3">
              <label for="description" class="form-label">{{ __('computer.description') }}</label>
              <textarea
                id="description"
                name="description"
                class="form-control"
                rows="3"
                required
              >{{ old('description', $viewData['computer']->getDescription()) }}</textarea>
            </div>

            {{-- Price --}}
            <div class="mb-3">
              <label for="price" class="form-label">{{ __('computer.price') }}</label>
              <input
                type="number"
                id="price"
                name="price"
                class="form-control"
                value="{{ old('price', $viewData['computer']->getPrice()) }}"
                step="0.01"
                min="0"
                required
              >
            </div>

            {{-- Current Image (non-editable) --}}
            @if($viewData['computer']->imagen_path)
              <div class="mb-4">
                <label class="form-label">{{ __('computer.image') }}</label>
                <div>
                  <img
                    src="{{ asset('storage/' . $viewData['computer']->imagen_path) }}"
                    alt="{{ $viewData['computer']->getName() }}"
                    class="img-fluid rounded"
                    style="max-height: 150px; object-fit: cover;"
                  >
                </div>
              </div>
            @endif

            {{-- Submit --}}
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-success">
                {{ __('computer.update') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
