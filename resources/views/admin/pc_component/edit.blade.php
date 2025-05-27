{{-- resources/views/admin/pc_component/edit.blade.php --}}
@extends('layouts.admin')

@section('title', __('pc_component.edit_title'))
@section('subtitle', __('pc_component.edit_subtitle'))

@section('content')
<div class="container py-4">
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
          <h4 class="mb-0">{{ __('pc_component.edit_title') }}</h4>
        </div>
        <div class="card-body" style="max-height: 80vh; overflow-y: auto; padding-right: 1rem;">
          <form
            method="POST"
            action="{{ route('admin.pc_component.update', $viewData['component']->getId()) }}"
          >
            @csrf
            @method('PUT')

            {{-- Reference --}}
            <div class="mb-3">
              <label for="reference" class="form-label">{{ __('pc_component.reference') }}</label>
              <input
                type="text"
                id="reference"
                name="reference"
                class="form-control"
                value="{{ old('reference', $viewData['component']->getReference()) }}"
                required
                autofocus
              >
            </div>

            {{-- Name --}}
            <div class="mb-3">
              <label for="name" class="form-label">{{ __('pc_component.name') }}</label>
              <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name', $viewData['component']->getName()) }}"
                required
              >
            </div>

            {{-- Brand --}}
            <div class="mb-3">
              <label for="brand" class="form-label">{{ __('pc_component.brand') }}</label>
              <input
                type="text"
                id="brand"
                name="brand"
                class="form-control"
                value="{{ old('brand', $viewData['component']->getBrand()) }}"
                required
              >
            </div>

            {{-- Quantity & Cores --}}
            <div class="row g-2 mb-3">
              <div class="col">
                <label for="quantity" class="form-label">{{ __('pc_component.quantity') }}</label>
                <input
                  type="number"
                  id="quantity"
                  name="quantity"
                  class="form-control"
                  value="{{ old('quantity', $viewData['component']->getQuantity()) }}"
                  min="1"
                  required
                >
              </div>
              <div class="col">
                <label for="cores" class="form-label">{{ __('pc_component.cores') }}</label>
                <input
                  type="number"
                  id="cores"
                  name="cores"
                  class="form-control"
                  value="{{ old('cores', $viewData['component']->getCores()) }}"
                  min="1"
                >
              </div>
            </div>

            {{-- Speed & Capacity --}}
            <div class="row g-2 mb-3">
              <div class="col">
                <label for="speed" class="form-label">{{ __('pc_component.speed') }}</label>
                <input
                  type="text"
                  id="speed"
                  name="speed"
                  class="form-control"
                  value="{{ old('speed', $viewData['component']->getSpeed()) }}"
                  required
                >
              </div>
              <div class="col">
                <label for="capacity" class="form-label">{{ __('pc_component.capacity') }}</label>
                <input
                  type="text"
                  id="capacity"
                  name="capacity"
                  class="form-control"
                  value="{{ old('capacity', $viewData['component']->getCapacity()) }}"
                >
              </div>
            </div>

            {{-- Generation & Type --}}
            <div class="row g-2 mb-3">
              <div class="col">
                <label for="generation" class="form-label">{{ __('pc_component.generation') }}</label>
                <input
                  type="text"
                  id="generation"
                  name="generation"
                  class="form-control"
                  value="{{ old('generation', $viewData['component']->getGeneration()) }}"
                  required
                >
              </div>
              <div class="col">
                <label for="type" class="form-label">{{ __('pc_component.type') }}</label>
                <input
                  type="text"
                  id="type"
                  name="type"
                  class="form-control"
                  value="{{ old('type', $viewData['component']->getType()) }}"
                  required
                >
              </div>
            </div>

            {{-- Description --}}
            <div class="mb-3">
              <label for="description" class="form-label">{{ __('pc_component.description') }}</label>
              <textarea
                id="description"
                name="description"
                class="form-control"
                rows="3"
                required
              >{{ old('description', $viewData['component']->getDescription()) }}</textarea>
            </div>

            {{-- Price --}}
            <div class="mb-3">
              <label for="price" class="form-label">{{ __('pc_component.price') }}</label>
              <input
                type="number"
                id="price"
                name="price"
                class="form-control"
                value="{{ old('price', $viewData['component']->getPrice()) }}"
                step="0.01"
                min="0"
                required
              >
            </div>

            {{-- Current Image (no modificar) --}}
            <div class="mb-4">
              <label class="form-label">{{ __('pc_component.current_image') }}</label>
              <div>
                @if($viewData['component']->getImage())
                  <img
                    src="{{ asset('storage/' . $viewData['component']->getImage()) }}"
                    alt="{{ $viewData['component']->getName() }}"
                    class="rounded"
                    style="max-width: 150px; object-fit: cover;"
                  >
                @else
                  <span class="text-muted">{{ __('pc_component.no_image') }}</span>
                @endif
              </div>
            </div>

            {{-- Actions --}}
            <div class="d-flex justify-content-end gap-2">
              <button type="submit" class="btn btn-success">
                {{ __('pc_component.save') }}
              </button>
              <a
                href="{{ route('admin.pc_component.index') }}"
                class="btn btn-secondary"
              >
                {{ __('pc_component.back_to_list') }}
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
