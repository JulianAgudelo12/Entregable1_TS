{{-- resources/views/admin/user/index.blade.php --}}
@extends('layouts.admin')

@section('title',    $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="container py-4">
  {{-- Encabezado con total (sin botón de creación) --}}
  <h3 class="mb-4">
    {{ __('user.title') }} ({{ $viewData['totalUsers'] }})
  </h3>

  {{-- Tabla responsive reutilizando estilos de Computer --}}
  <div class="table-responsive" style="max-height: 75vh; overflow-y: auto;">
    <table class="table table-striped table-bordered mb-0">
      <thead class="table-dark">
        <tr>
          <th>{{ __('user.id') }}</th>
          <th>{{ __('user.name') }}</th>
          <th>{{ __('user.email') }}</th>
          <th>{{ __('user.phone') }}</th>
          <th>{{ __('user.created_at') }}</th>
          <th>{{ __('user.updated_at') }}</th>
          <th>{{ __('user.role') }}</th>
          <th>{{ __('user.actions') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($viewData['users'] as $user)
          <tr>
            <td>{{ $user->getId() }}</td>
            <td>{{ $user->getName() }}</td>
            <td>{{ $user->getEmail() }}</td>
            <td>{{ $user->getCellphone() }}</td>
            <td>{{ $user->getCreatedAt() }}</td>
            <td>{{ $user->getUpdatedAt() }}</td>
            <td>
              {{ $user->getIsAdmin()
                  ? __('user.admin')
                  : __('user.client') }}
            </td>
            <td class="d-flex gap-2">
              <a
                href="{{ route('admin.user.edit', $user->getId()) }}"
                class="btn btn-warning btn-sm"
              >
                {{ __('user.edit') }}
              </a>
              <form
                action="{{ route('admin.user.destroy', $user->getId()) }}"
                method="POST"
                class="m-0"
                onsubmit="return confirm('{{ __('user.confirm_deletion') }}')"
              >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  {{ __('user.delete') }}
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
