@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
@if(session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
@endif
<form method="GET" action="{{ route('computer.index') }}" class="filter-form">
    <input type="text" name="name" placeholder="Search by name" value="{{ request('name') }}">
    <input type="text" name="brand" placeholder="brand" value="{{ request('brand') }}">
    <input type="number" name="min_price" placeholder="Min price" step="0.01" value="{{ request('min_price') }}">
    <input type="number" name="max_price" placeholder="Max price" step="0.01" value="{{ request('max_price') }}">
    <button type="submit">Filter</button>
</form>
<form method="GET" action="{{ route('computer.compare') }}">
    <div class="row">
        @foreach ($viewData["computers"] as $computer)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
              @if($computer->imagen_path)
              <img src="{{ asset('storage/' . $computer->imagen_path) }}" class="card-img-top img-card" alt="{{ $computer->getName() }}">
              @else
              <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card" alt="Default Image">
              @endif
                <div class="card-body text-center">
                    <p class="card-text">${{ number_format($computer->getPrice(), 2) }}</p>
                    <a href="{{ route('computer.show', ['id'=> $computer->getId()]) }}" class="btn bg-primary text-white">{{ $computer->getName() }}</a>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="computers[]" value="{{ $computer->getId() }}">
                        <label class="form-check-label">Compare</label>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-success mt-3">Compare Selected</button>
</form>
@endsection