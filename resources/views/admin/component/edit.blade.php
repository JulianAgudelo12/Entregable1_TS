<!-- Developed by Julian Agudelo -->
@extends('layouts.admin')

@section("title", $viewData["title"])

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('component.update_title') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ route('admin.component.update', ['id' => $viewData['component']->getId()]) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="reference" class="form-label">{{ __('component.reference') }}</label>
                <input type="text" class="form-control" id="reference" name="reference" required value="{{ old('reference', $viewData['component']->getReference()) }}">
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">{{ __('component.name') }}</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $viewData['component']->getName()) }}">
              </div>

              <div class="mb-3">
                <label for="brand" class="form-label">{{ __('component.brand') }}</label>
                <input type="text" class="form-control" id="brand" name="brand" required value="{{ old('brand', $viewData['component']->getBrand()) }}">
              </div>

              <div class="mb-3">
                <label for="quantity" class="form-label">{{ __('component.quantity') }}</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required min="1" value="{{ old('quantity', $viewData['component']->getQuantity()) }}">
              </div>

              <div class="mb-3">
                <label for="image" class="form-label">{{ __('component.image') }}</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
              </div>

              <div class="mb-3">
                <label for="speed" class="form-label">{{ __('component.speed') }}</label>
                <input type="text" class="form-control" id="speed" name="speed" required value="{{ old('speed', $viewData['component']->getSpeed()) }}">
              </div>

              <div class="mb-3">
                <label for="capacity" class="form-label">{{ __('component.capacity') }}</label>
                <input type="text" class="form-control" id="capacity" name="capacity" value="{{ old('capacity', $viewData['component']->getCapacity()) }}">
              </div>

              <div class="mb-3">
                <label for="generation" class="form-label">{{ __('component.generation') }}</label>
                <input type="text" class="form-control" id="generation" name="generation" required value="{{ old('generation', $viewData['component']->getGeneration()) }}">
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">{{ __('component.type') }}</label>
                <input type="text" class="form-control" id="type" name="type" required value="{{ old('type', $viewData['component']->getType()) }}">
              </div>

              <div class="mb-3">
                <label for="cores" class="form-label">{{ __('component.cores') }}</label>
                <input type="number" class="form-control" id="cores" name="cores" min="1" value="{{ old('cores', $viewData['component']->getCores()) }}">
              </div>

              <div class="mb-3">
                <label for="price" class="form-label">{{ __('component.price') }}</label>
                <input type="number" class="form-control" id="price" name="price" required min="0" value="{{ old('price', $viewData['component']->getPrice()) }}">
              </div>

              <button type="submit" class="btn btn-success">{{ __('component.save') }}</button>
              <a href="{{ route('admin.component.index') }}" class="btn btn-secondary">{{ __('component.back_to_list') }}</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
