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


<div class="table-responsive" style="max-height: 800px; overflow-y: auto;">
  <table class="table table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th style="width: 80px;">{{ __('component.reference') }}</th>
        <th style="width: 120px;">{{ __('component.name') }}</th>
        <th style="width: 100px;">{{ __('component.brand') }}</th>
        <th style="width: 80px;">{{ __('component.quantity') }}</th>
        <th style="width: 80px;">{{ __('component.speed') }}</th>
        <th style="width: 80px;">{{ __('component.capacity') }}</th>
        <th style="width: 80px;">{{ __('component.generation') }}</th>
        <th style="width: 80px;">{{ __('component.type') }}</th>
        <th style="width: 80px;">{{ __('component.cores') }}</th>
        <th style="width: 80px;">{{ __('component.price') }}</th>
        <th style="width: 80px;">{{ __('component.image') }}</th>
        <th style="width: 150px;">{{ __('component.actions') }}</th>
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
          @if($component->getImagePath())
            <img src="{{ asset('storage/' . $component->getImagePath()) }}" alt="{{ $component->getName() }}" style="max-width: 50px; max-height: 50px;">
          @else
            {{ __('component.no_image') }}
          @endif
        </td>
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
</div>

@endsection
