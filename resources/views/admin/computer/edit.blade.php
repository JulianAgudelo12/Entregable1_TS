@extends('layouts.admin')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit Computer</div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.computer.update', ['id' => $viewData['computer']->getId()]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="reference">Reference</label>
              <input type="text" class="form-control" id="reference" name="reference" value="{{ old('reference', $viewData['computer']->getReference()) }}" required>
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $viewData['computer']->getName()) }}" required>
            </div>
            <div class="form-group">
              <label for="brand">Brand</label>
              <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $viewData['computer']->getBrand()) }}" required>
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $viewData['computer']->getQuantity()) }}" required>
            </div>
            <div class="form-group">
              <label for="type">Type</label>
              <select class="form-control" id="type" name="type">
                <option value="" disabled>-- Select a type --</option>
                <option value="desktop" {{ old('type', $viewData['computer']->getType()) == 'desktop' ? 'selected' : '' }}>Desktop</option>
                <option value="laptop" {{ old('type', $viewData['computer']->getType()) == 'laptop' ? 'selected' : '' }}>Laptop</option>
              </select>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $viewData['computer']->getDescription()) }}" required>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $viewData['computer']->getPrice()) }}" required>
            </div>
            <div class="form-group">
              <label for="image">Computer Image</label>
              <input type="file" class="form-control-file" id="image" name="image">
              @if($viewData['computer']->imagen_path)
                <img src="{{ asset('storage/' . $viewData['computer']->imagen_path) }}" alt="{{ $viewData['computer']->getName() }}" style="max-width: 100px; margin-top: 5px;">
              @endif
            </div>
            <button type="submit" class="btn btn-success">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection