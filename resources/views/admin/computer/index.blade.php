<!-- Developed by Valeria Corrales Hoyos -->
@extends('layouts.admin')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
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
<form method="GET" action="{{ route('admin.computer.index') }}" class="filter-form">
    <input type="text" name="name" placeholder="Search by name" value="{{ request('name') }}">
    <input type="text" name="brand" placeholder="brand" step="0.01" value="{{ request('brand') }}">
    <input type="number" name="min_price" placeholder="Min price" step="0.01" value="{{ request('min_price') }}">
    <input type="number" name="max_price" placeholder="Max price" step="0.01" value="{{ request('max_price') }}">
    <button type="submit">Filter</button>
</form>
<a href="{{ route('admin.computer.create') }}" class="btn btn-primary mb-3">Create Computer</a>
<table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th>Reference</th>
      <th>Name</th>
      <th>Brand</th>
      <th>Quantity</th>
      <th>Type</th>
      <th>Price</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($viewData["computers"] as $computer)
    <tr>
      <td>{{ $computer->getReference() }}</td>
      <td>{{ $computer->getName() }}</td>
      <td>{{ $computer->getBrand() }}</td>
      <td>{{ $computer->getQuantity() }}</td>
      <td>{{ ucfirst($computer->getType()) }}</td>
      <td>${{ number_format($computer->getPrice(), 2) }}</td>
      <td>
        <a href="{{ route('admin.computer.show', ['id'=> $computer->getId()]) }}" class="btn btn-info btn-sm">View</a>
        <a href="{{ route('admin.computer.edit', ['id'=> $computer->getId()]) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('admin.computer.destroy', ['id' => $computer->getId()]) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this reference?')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
