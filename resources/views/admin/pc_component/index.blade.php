{{-- resources/views/admin/pc_component/index.blade.php --}}
@extends('layouts.admin')

@section('title',    $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="container py-4">
  {{-- Validation Errors --}}
  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0 list-unstyled">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Success Message --}}
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  {{-- Create Button --}}
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.pc_component.create') }}" class="btn btn-primary">
      {{ __('pc_component.create') }}
    </a>
  </div>

  {{-- Components Table --}}
  <div class="table-responsive" style="max-height:75vh; overflow-y:auto;">
    <table class="table table-striped table-bordered mb-0">
      <thead class="table-dark">
        <tr>
          <th>{{ __('pc_component.reference') }}</th>
          <th>{{ __('pc_component.name') }}</th>
          <th>{{ __('pc_component.brand') }}</th>
          <th>{{ __('pc_component.quantity') }}</th>
          <th>{{ __('pc_component.speed') }}</th>
          <th>{{ __('pc_component.capacity') }}</th>
          <th>{{ __('pc_component.generation') }}</th>
          <th>{{ __('pc_component.type') }}</th>
          <th>{{ __('pc_component.cores') }}</th>
          <th>{{ __('pc_component.price') }}</th>
          <th>{{ __('pc_component.actions') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($viewData['components'] as $component)
          <tr>
            <td>{{ $component->getReference() ?: __('NULL') }}</td>
            <td>{{ $component->getName() ?: __('NULL') }}</td>
            <td>{{ $component->getBrand() ?: __('NULL') }}</td>
            <td>{{ $component->getQuantity() ?? __('NULL') }}</td>
            <td>{{ $component->getSpeed() ?: __('NULL') }}</td>
            <td>{{ $component->getCapacity() ?: __('NULL') }}</td>
            <td>{{ $component->getGeneration() ?: __('NULL') }}</td>
            <td>{{ $component->getType() ? ucfirst($component->getType()) : __('NULL') }}</td>
            <td>{{ $component->getCores() ?? __('NULL') }}</td>
            <td>
              {{ $component->getPrice() !== null
                 ? '$' . number_format($component->getPrice(), 2)
                 : __('NULL') }}
            </td>
            <td class="d-flex gap-2">
              <a
                href="{{ route('admin.pc_component.show', $component->getId()) }}"
                class="btn btn-info btn-sm"
              >
                {{ __('pc_component.view') }}
              </a>
              <a
                href="{{ route('admin.pc_component.edit', $component->getId()) }}"
                class="btn btn-warning btn-sm"
              >
                {{ __('pc_component.edit') }}
              </a>
              <form
                action="{{ route('admin.pc_component.destroy', $component->getId()) }}"
                method="POST"
                class="m-0"
                onsubmit="return confirm('{{ __('pc_component.confirm_deletion') }}')"
              >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  {{ __('pc_component.delete') }}
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
