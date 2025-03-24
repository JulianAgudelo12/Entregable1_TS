@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

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
                <a class="btn btn-warning btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
