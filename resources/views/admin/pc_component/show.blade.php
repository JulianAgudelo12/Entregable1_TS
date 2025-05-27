{{-- resources/views/admin/pc_component/show.blade.php --}}

@extends('layouts.admin')

@section('title',    $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="card mb-3" style="max-height: 80vh; overflow-y: auto; padding: 1rem;">
  <div class="row g-0">
    {{-- Imagen --}}
    <div class="col-md-4">
      @if($viewData['component']->getImage())
        <img
          src="{{ Storage::url($viewData['component']->getImage()) }}"
          alt="{{ $viewData['component']->getName() }}"
          class="rounded-start"
          style="width:100%; height:100%; object-fit:cover;"
        >
      @else
        <div
          class="bg-light d-flex align-items-center justify-content-center rounded-start"
          style="width:100%; height:100%; min-height:200px;"
        >
          <span class="text-muted">{{ __('pc_component.no_image') }}</span>
        </div>
      @endif
    </div>

    {{-- Detalles --}}
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title fw-bold mb-3">
          {{ $viewData['component']->getName() }}
        </h5>

        <p class="text-success h5 mb-4">
          {{ '$' . number_format($viewData['component']->getPrice(), 2) }}
        </p>

        <ul class="list-unstyled mb-4">
          <li><strong>{{ __('pc_component.reference') }}:</strong>   {{ $viewData['component']->getReference() }}</li>
          <li><strong>{{ __('pc_component.brand') }}:</strong>       {{ $viewData['component']->getBrand() }}</li>
          <li><strong>{{ __('pc_component.quantity') }}:</strong>    {{ $viewData['component']->getQuantity() }}</li>
          <li><strong>{{ __('pc_component.speed') }}:</strong>       {{ $viewData['component']->getSpeed() }}</li>
          <li><strong>{{ __('pc_component.capacity') }}:</strong>    {{ $viewData['component']->getCapacity() }}</li>
          <li><strong>{{ __('pc_component.generation') }}:</strong>  {{ $viewData['component']->getGeneration() }}</li>
          <li><strong>{{ __('pc_component.type') }}:</strong>        {{ ucfirst($viewData['component']->getType()) }}</li>
          <li><strong>{{ __('pc_component.cores') }}:</strong>       {{ $viewData['component']->getCores() }}</li>
          <li><strong>{{ __('pc_component.description') }}:</strong> {{ $viewData['component']->getDescription() }}</li>
        </ul>

        <div class="d-flex gap-2">
          <a
            href="{{ route('admin.pc_component.edit',   $viewData['component']->getId()) }}"
            class="btn btn-warning btn-sm"
          >
            {{ __('pc_component.edit') }}
          </a>
          <form
            action="{{ route('admin.pc_component.destroy', $viewData['component']->getId()) }}"
            method="POST"
            onsubmit="return confirm('{{ __('pc_component.confirm_deletion') }}')"
          >
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
              {{ __('pc_component.delete') }}
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
