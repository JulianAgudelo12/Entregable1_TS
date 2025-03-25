<!-- Developed by Valeria Corrales Hoyos -->
@extends('layouts.admin')
@section("title", $viewData["title"])
@section('content')
@if($errors->any())
  <ul id="errors" class="alert alert-danger list-unstyled">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit Computer</div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.computer.update', ['id' => $viewData['computer']->getId()]) }}">
            @csrf
            @method('PUT') 
            <input type="text" class="form-control mb-2" placeholder="Enter reference" name="reference" value="{{ old('reference', $viewData['computer']->getReference()) }}" required />
            <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name', $viewData['computer']->getName()) }}" required/>
            <input type="text" class="form-control mb-2" placeholder="Enter brand" name="brand" value="{{ old('brand', $viewData['computer']->getBrand()) }}" required/>
            <input type="text" class="form-control mb-2" placeholder="Enter quantity" name="quantity" value="{{ old('quantity', $viewData['computer']->getQuantity()) }}" required/>
            <select class="form-control mb-2" name="type">
              <option value="" disabled>-- Select a type --</option>
              <option value="desktop" {{ old('type', $viewData['computer']->getType()) == 'desktop' ? 'selected' : '' }}>Desktop</option>
              <option value="laptop" {{ old('type', $viewData['computer']->getType()) == 'laptop' ? 'selected' : '' }}>Laptop</option>
            </select>
            <input type="text" class="form-control mb-2" placeholder="Enter description" name="description" value="{{ old('description', $viewData['computer']->getDescription()) }}" required/>
            <input type="text" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ old('price', $viewData['computer']->getPrice()) }}" required/>
            <input type="submit" class="btn btn-success" value="Update" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
