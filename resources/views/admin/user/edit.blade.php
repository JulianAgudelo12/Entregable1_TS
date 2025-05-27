{{-- resources/views/admin/user/edit.blade.php --}}
@extends('layouts.admin')

@section('title',    __('user.update_title'))
@section('header-actions')
  <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
    {{ __('user.back') }}
  </a>
@endsection

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

  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header">
          <h4 class="mb-0">{{ __('user.update_title') }}</h4>
        </div>
        <div class="card-body">
          <form
            method="POST"
            action="{{ route('admin.user.update', ['id' => $viewData['user']->getId()]) }}"
          >
            @csrf
            @method('PUT')

            {{-- Name (read-only) --}}
            <div class="mb-3">
              <label for="name" class="form-label">{{ __('user.name') }}</label>
              <input
                type="text"
                id="name"
                class="form-control"
                value="{{ $viewData['user']->getName() }}"
                disabled
              >
            </div>

            {{-- Admin role toggle --}}
            <div class="form-check mb-4">
              <input
                class="form-check-input"
                type="checkbox"
                id="is_admin"
                name="is_admin"
                {{ old('is_admin', $viewData['user']->getIsAdmin()) ? 'checked' : '' }}
              >
              <label class="form-check-label" for="is_admin">
                {{ __('user.admin') }}
              </label>
            </div>

            {{-- Submit --}}
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">
                {{ __('user.update') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
