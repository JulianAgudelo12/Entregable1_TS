{{-- resources/views/admin/computer/index.blade.php --}}
@extends('layouts.admin')

@section('title',    $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="container py-2">

  {{-- Errores --}}
  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Éxito --}}
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  {{-- Filtros --}}
  <form method="GET"
        action="{{ route('admin.computer.index') }}"
        class="mb-3">
    <div class="row g-2">
      <div class="col-md-3">
        <input
          type="text"
          name="name"
          value="{{ request('name') }}"
          class="form-control"
          placeholder="{{ __('computer.search_byname') }}"
        >
      </div>
      <div class="col-md-3">
        <input
          type="text"
          name="brand"
          value="{{ request('brand') }}"
          class="form-control"
          placeholder="{{ __('computer.search_bybrand')  }}"
        >
      </div>
      <div class="col-md-2">
        <input
          type="number"
          name="min_price"
          value="{{ request('min_price') }}"
          class="form-control"
          placeholder="{{ __('computer.minprice')  }}"
          step="0.01"
        >
      </div>
      <div class="col-md-2">
        <input
          type="number"
          name="max_price"
          value="{{ request('max_price') }}"
          class="form-control"
          placeholder="{{ __('computer.maxprice')  }}"
          step="0.01"
        >
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">
          {{ __('computer.filter') }}
        </button>
      </div>
    </div>
  </form>

  {{-- Crear --}}
  <a href="{{ route('admin.computer.create') }}" class="btn btn-primary mb-3">
    {{ __('computer.create') }}
  </a>

  {{-- Tabla --}}
  <div class="table-responsive overflow-auto" style="max-height: 75vh;">
    <table class="table table-striped table-bordered mb-0">
      <thead class="table-dark">
        <tr>
          <th>{{ __('computer.reference') }}</th>
          <th>{{ __('computer.name') }}</th>
          <th>{{ __('computer.brand') }}</th>
          <th>{{ __('computer.quantity') }}</th>
          <th>{{ __('computer.type') }}</th>
          <th>{{ __('computer.price') }}</th>
          <th>{{ __('computer.actions') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($viewData['computers'] as $computer)
          <tr>
            <td>{{ $computer->getReference() }}</td>
            <td>{{ $computer->getName() }}</td>
            <td>{{ $computer->getBrand() }}</td>
            <td>{{ $computer->getQuantity() }}</td>
            <td>{{ __(ucfirst($computer->getType())) }}</td>
            <td>{{ '$' . number_format($computer->getPrice(), 2) }}</td>
            <td class="d-flex gap-2">
              <a
                href="{{ route('admin.computer.show', $computer->getId()) }}"
                class="btn btn-info btn-sm"
              >
                {{ __('computer.view') }}
              </a>
              <a
                href="{{ route('admin.computer.edit', $computer->getId()) }}"
                class="btn btn-warning btn-sm"
              >
                {{ __('computer.edit') }}
              </a>
              <form
                action="{{ route('admin.computer.destroy', $computer->getId()) }}"
                method="POST"
                class="m-0 p-0"
                onsubmit="return confirm('{{ __('computer.confirm_deletion') }}')"
              >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  {{ __('computer.delete') }}
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
