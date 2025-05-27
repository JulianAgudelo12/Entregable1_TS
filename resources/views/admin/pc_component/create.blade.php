{{-- resources/views/admin/pc_component/create.blade.php --}}
@extends('layouts.admin')

@section('title', __('pc_component.create_title'))
@section('subtitle', __('pc_component.create_subtitle'))

@section('content')
<div class="container py-4">
  {{-- Validation Errors --}}
  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0 list-unstyled">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Success Message --}}
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header">
          <h4 class="mb-0">{{ __('pc_component.create_title') }}</h4>
        </div>
        <div class="card-body">
          <form
            method="POST"
            action="{{ route('admin.pc_component.store') }}"
            enctype="multipart/form-data"
          >
            @csrf

            {{-- Reference --}}
            <div class="mb-3">
              <label for="reference" class="form-label">
                {{ __('pc_component.reference') }}
              </label>
              <input
                type="text"
                id="reference"
                name="reference"
                class="form-control"
                value="{{ old('reference') }}"
                required
                placeholder="{{ __('pc_component.reference_placeholder') }}"
              >
            </div>

            {{-- Name --}}
            <div class="mb-3">
              <label for="name" class="form-label">
                {{ __('pc_component.name') }}
              </label>
              <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                required
                placeholder="{{ __('pc_component.name_placeholder') }}"
              >
            </div>

            {{-- Brand --}}
            <div class="mb-3">
              <label for="brand" class="form-label">
                {{ __('pc_component.brand') }}
              </label>
              <input
                type="text"
                id="brand"
                name="brand"
                class="form-control"
                value="{{ old('brand') }}"
                required
                placeholder="{{ __('pc_component.brand_placeholder') }}"
              >
            </div>

            {{-- Quantity & Cores --}}
            <div class="row g-2 mb-3">
              <div class="col">
                <label for="quantity" class="form-label">
                  {{ __('pc_component.quantity') }}
                </label>
                <input
                  type="number"
                  id="quantity"
                  name="quantity"
                  class="form-control"
                  value="{{ old('quantity') }}"
                  min="1"
                  required
                >
              </div>
              <div class="col">
                <label for="cores" class="form-label">
                  {{ __('pc_component.cores') }}
                </label>
                <input
                  type="number"
                  id="cores"
                  name="cores"
                  class="form-control"
                  value="{{ old('cores') }}"
                  min="1"
                >
              </div>
            </div>

            {{-- Speed & Capacity --}}
            <div class="row g-2 mb-3">
              <div class="col">
                <label for="speed" class="form-label">
                  {{ __('pc_component.speed') }}
                </label>
                <input
                  type="text"
                  id="speed"
                  name="speed"
                  class="form-control"
                  value="{{ old('speed') }}"
                  required
                >
              </div>
              <div class="col">
                <label for="capacity" class="form-label">
                  {{ __('pc_component.capacity') }}
                </label>
                <input
                  type="text"
                  id="capacity"
                  name="capacity"
                  class="form-control"
                  value="{{ old('capacity') }}"
                >
              </div>
            </div>

            {{-- Generation & Type --}}
            <div class="row g-2 mb-3">
              <div class="col">
                <label for="generation" class="form-label">
                  {{ __('pc_component.generation') }}
                </label>
                <input
                  type="text"
                  id="generation"
                  name="generation"
                  class="form-control"
                  value="{{ old('generation') }}"
                  required
                >
              </div>
              <div class="col">
                <label for="type" class="form-label">
                  {{ __('pc_component.type') }}
                </label>
                <input
                  type="text"
                  id="type"
                  name="type"
                  class="form-control"
                  value="{{ old('type') }}"
                  required
                >
              </div>
            </div>

            {{-- Description --}}
            <div class="mb-3">
              <label for="description" class="form-label">
                {{ __('pc_component.description') }}
              </label>
              <textarea
                id="description"
                name="description"
                class="form-control"
                rows="3"
                placeholder="{{ __('pc_component.description_placeholder') }}"
                required
              >{{ old('description') }}</textarea>
            </div>

            {{-- Price --}}
            <div class="mb-3">
              <label for="price" class="form-label">
                {{ __('pc_component.price') }}
              </label>
              <input
                type="number"
                id="price"
                name="price"
                class="form-control"
                value="{{ old('price') }}"
                required
                step="0.01"
                min="0"
              >
            </div>

            {{-- Image --}}
            <div class="mb-4">
              <label for="image" class="form-label">
                {{ __('pc_component.image') }}
              </label>
              <input
                type="file"
                id="image"
                name="image"
                class="form-control"
                accept="image/*"
                required
              >
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
                {{ __('pc_component.back') }}
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
