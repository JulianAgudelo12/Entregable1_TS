@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          <b>{{ $viewData["computer"]->getName() }}</b>
        </h5>
        <p class="card-text"style="color: green">$ {{ $viewData["computer"]->getPrice() }}</p>
        <p class="card-text">Ref: {{ $viewData["computer"]->getReference() }}</p>
        <p class="card-text">Brand: {{ $viewData["computer"]->getBrand() }}</p>
        <p class="card-text">Type: {{ $viewData["computer"]->getType() }}</p>
        <p class="card-text">Description: {{ $viewData["computer"]->getDescription() }}</p>
        <p class="card-text">Stock: {{ $viewData["computer"]->getQuantity() }}</p> 
        <form action="{{ route('admin.computer.destroy', $viewData["computer"]->getId()) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this reference?')">Delete</button>
        </form>        
      </div>
    </div>
  </div>
</div>
@endsection