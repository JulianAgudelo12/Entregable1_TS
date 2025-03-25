<!-- Developed by Julian Agudelo -->
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
<a href="{{ route('admin.component.create') }}" class="btn btn-primary mb-3">{{ __('component.create') }}</a>
<table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th>{{ __('component.reference') }}</th>
      <th>{{ __('component.name') }}</th>
      <th>{{ __('component.brand') }}</th>
      <th>{{ __('component.quantity') }}</th>
      <th>{{ __('component.speed') }}</th>
      <th>{{ __('component.capacity') }}</th>
      <th>{{ __('component.generation') }}</th>
      <th>{{ __('component.type') }}</th>
      <th>{{ __('component.cores') }}</th>
      <th>{{ __('component.price') }}</th>
      <th>{{ __('component.actions') }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($viewData["components"] as $component)
    <tr>
      <td>{{ $component->getReference() }}</td>
      <td>{{ $component->getName() }}</td>
      <td>{{ $component->getBrand() }}</td> 
      <td>{{ $component->getQuantity() }}</td>
      <td>{{ $component->getSpeed() }}</td>
      <td>{{ $component->getCapacity() }}</td>
      <td>{{ $component->getGeneration() }}</td>
      <td>{{ $component->getType() }}</td>
      <td>{{ $component->getCores() }}</td>
      <td>${{ number_format($component->getPrice(), 2) }}</td>
      <td>
        <a href="{{ route('admin.component.show', ['id'=> $component->getId()]) }}" class="btn btn-info btn-sm">{{ __('component.view') }}</a>
        <a href="{{ route('admin.component.edit', ['id'=> $component->getId()]) }}" class="btn btn-warning btn-sm">{{ __('component.edit') }}</a>
        <form action="{{ route('admin.component.destroy', ['id' => $component->getId()]) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('component.delete_confirmation') }}')">{{ __('component.delete') }}</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
