<!-- Developed by Valeria Corrales Hoyos -->
@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create Computer</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif
            <form method="POST" action="{{ route('admin.computer.index') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter reference" name="reference" value="{{ old('reference') }}" required />
              <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" required/>
              <input type="text" class="form-control mb-2" placeholder="Enter brand" name="brand" value="{{ old('brand') }}" required/>
              <input type="text" class="form-control mb-2" placeholder="Enter quantity" name="quantity" value="{{ old('quantity') }}" required/>
              <select class="form-control mb-2" name="type">
                <option value="" disabled selected>-- Select a type --</option>
                <option value="desktop" {{ old('type') == 'desktop' ? 'selected' : '' }}>Desktop</option>
                <option value="laptop" {{ old('type') == 'laptop' ? 'selected' : '' }}>Laptop</option>
              </select>
              <input type="text" class="form-control mb-2" placeholder="Enter description" name="description" value="{{ old('description') }}" required/>
              <input type="text" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ old('price') }}" required/>
              <input type="submit" class="btn btn-primary" value="Send" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
